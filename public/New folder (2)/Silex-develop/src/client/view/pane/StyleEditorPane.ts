/**
 * Silex, live web creation
 * http://projects.silexlabs.org/?/silex/
 *
 * Copyright (c) 2012 Silex Labs
 * http://www.silexlabs.org/
 *
 * Silex is available under the GPL license
 * http://www.silexlabs.org/silex/silex-licensing/
 */

import { SelectableState } from 'drag-drop-stage-component/src/ts/Types';
import {Constants} from '../../../Constants';
import {StyleName} from '../../model/Data';
import {Visibility} from '../../model/Data';
import {StyleData} from '../../model/Data';
import {Tracker} from '../../service/tracker';
import {Controller} from '../../types';
import {Model} from '../../types';
import {SilexNotification} from '../../utils/notification';
import {PaneBase} from './pane-base';

/**
 * @fileoverview The style editor pane is displayed in the property panel on the
 * right. It is a prodotype component used to edit the css styles
 *
 */
export class StyleEditorPane extends PaneBase {
  // tracker for analytics
  tracker: any;

  styleComboPrevValue: StyleName = '';

  // Build the UI
  styleCombo: any;
  pseudoClassCombo: any;
  mobileOnlyCheckbox: any;

  // select elements which have this style
  selectionCountTotal: any;

  // select only elements on this page
  selectionCountPage: any;

  /**
   *
   * @param element   container to render the UI
   * @param model  model class which holds
   * the model instances - views use it for
   * read operation only
   * @param controller  structure which holds
   * the controller instances
   */
  constructor(element: HTMLElement, model: Model, controller: Controller) {
    super(element, model, controller);
    this.tracker = Tracker.getInstance();
    this.styleCombo = this.element.querySelector('.class-name-style-combo-box');
    this.pseudoClassCombo = this.element.querySelector('.pseudoclass-style-combo-box');
    this.mobileOnlyCheckbox = this.element.querySelector('.visibility-style-checkbox');
    this.pseudoClassCombo.onchange = (e) => {
      this.tracker.trackAction('style-editor-events', 'select-pseudo-class');
      this.controller.editMenuController.editStyle(this.styleCombo.value, this.getPseudoClass(), this.getVisibility());
      const styleData = (this.model.property.getStyleData(this.styleCombo.value) ||  {} as StyleData);
      this.updateTagButtonBar(styleData);
    };
    this.mobileOnlyCheckbox.onchange = (e) => {
      // switch the mobile editor mode
      this.controller.propertyToolController.view.workspace.setMobileEditor(
          this.mobileOnlyCheckbox.checked);

      // refresh the view
      this.controller.propertyToolController.refreshView();
    };
    this.styleCombo.onchange = (e) => {
      this.tracker.trackAction('style-editor-events', 'apply-style');
      this.applyStyle(this.states.map((state) => state.el), this.styleCombo.value);

      // refresh the view
      this.controller.propertyToolController.refreshView();
    };
    (this.element.querySelector('.add-style') as HTMLElement).onclick = (e) => {
      this.tracker.trackAction('style-editor-events', 'create-style');
      this.createStyle();
    };
    (this.element.querySelector('.remove-style') as HTMLElement).onclick = (e) => {
      this.tracker.trackAction('style-editor-events', 'remove-style');

      // delete from styles list
      this.deleteStyle(this.styleCombo.value);
    };

    // un-apply style
    (this.element.querySelector('.unapply-style') as HTMLElement).onclick = (e) => {
      this.tracker.trackAction('style-editor-events', 'unapply-style');
      this.states.filter((state) => state.el !== this.model.body.getBodyElement())
      .forEach((state) => {
        state.el.classList.remove(this.styleCombo.value);
      });

      // refresh the view
      this.controller.propertyToolController.refreshView();
    };
    this.selectionCountTotal = this.element.querySelector('.total');
    this.selectionCountTotal.onclick = (e) => {
      this.tracker.trackAction(
          'style-editor-events', 'select-elements-with-style');
      const newSelection = this.getElementsWithStyle(this.styleCombo.value, true);
      this.model.body.setSelection(newSelection);
    };
    this.selectionCountPage = this.element.querySelector('.on-page');
    this.selectionCountPage.onclick = (e) => {
      this.tracker.trackAction(
          'style-editor-events', 'select-all-elements-with-style');
      const newSelection =
          this.getElementsWithStyle(this.styleCombo.value, false);
      this.model.body.setSelection(newSelection);
    };

    // duplicate a style
    (this.element.querySelector('.duplicate-style') as HTMLElement).onclick = (e) => {
      this.tracker.trackAction('style-editor-events', 'duplicate-style');
      this.createStyle(this.model.property.getStyleData(this.styleCombo.value));
    };

    // reset style:
    // this.model.component.initStyle(this.styleCombo.options[this.styleCombo.selectedIndex].text,
    // this.styleCombo.value, this.getPseudoClass(), this.getVisibility());
    // rename style
    (this.element.querySelector('.edit-style') as HTMLElement).onclick = (e) => {
      this.tracker.trackAction('style-editor-events', 'edit-style');
      const oldClassName = this.styleCombo.value;
      if (oldClassName === Constants.BODY_STYLE_CSS_CLASS) {
        SilexNotification.alert('Rename a style', `
          The style '${Constants.BODY_STYLE_NAME}' is a special style, you can not rename it.
        `,
        () => {});
      } else {
        const data = this.model.property.getStyleData(oldClassName);
        this.createStyle(data, (name) => {
          // update the style name
          this.getElementsWithStyle(oldClassName, true).forEach((el) => {
            el.classList.add(this.styleCombo.value);
          });

          // delete the old one
          if (oldClassName !== Constants.EMPTY_STYLE_CLASS_NAME) {
            // case of rename the empty style (=> only create a new style)
            this.deleteStyle(oldClassName, false);
          }
        });
      }
    };

    // for tracking only
    (this.element.querySelector('.style-editor-tag-form .labels') as HTMLElement).onclick =
        (e) => {
          this.tracker.trackAction('style-editor-events', 'select-tag');
        };
  }

  /**
   * Get all the elements which have a given style
   * @param includeOffPage, if false it excludes the elements which are not
   *     visible in the current page
   */
  getElementsWithStyle(styleName: StyleName, includeOffPage: boolean): HTMLElement[] {
    const doc = this.model.file.getContentDocument();
    const newSelection: HTMLElement[] = Array.from(doc.querySelectorAll('.' + styleName));
    if (includeOffPage) {
      return newSelection;
    } else {
      return newSelection.filter(
          (el) => this.model.page.isInPage(el) ||
              this.model.page.getPagesForElement(el).length === 0);
    }
  }

  /**
   * get the visibility (mobile+desktop or desktop) of the style being edited
   */
  getVisibility(): Visibility {
    return Constants.STYLE_VISIBILITY[this.isMobile() ? 1 : 0];
  }

  /**
   * @return true if we are in mobile editor
   * because views (view.workspace.get/setMobileEditor) is not accessible from
   * other views
   * FIXME: find another way to expose isMobileEditor to views
   */
  isMobile(): boolean {
    return document.body.classList.contains('mobile-mode');
  }

  /**
   * apply a style to a set of elements, remove old styles
   */
  applyStyle(elements: HTMLElement[], newStyle: StyleName) {
    if (newStyle === Constants.BODY_STYLE_CSS_CLASS) {
      SilexNotification.alert('Apply a style', `
        The style '${Constants.BODY_STYLE_NAME}' is a special style, it is already applyed to all elements.
      `,
      () => {});
    } else {
      this.controller.propertyToolController.undoCheckPoint();
      const noBody = elements.filter((el) => el !== this.model.body.getBodyElement());
      if (noBody.length > 0) {
        noBody.forEach((el) => {
          // un-apply the old style if there was one
          this.removeAllStyles(el);

          // apply the new style if there is one
          el.classList.add(newStyle);
        });
        this.controller.propertyToolController.refreshView();
      } else {
        SilexNotification.alert('Apply a style', 'Error: you need to select at least 1 element for this action.', () => {});
      }
    }
  }

  removeAllStyles(el: HTMLElement) {
    this.getStyles([el]).forEach((styleName) => el.classList.remove(styleName));
  }

  /**
   * retrieve the styles applyed to the set of elements
   */
  getStyles(elements: HTMLElement[]): StyleName[] {
    const allStyles = this.model.component.getProdotypeComponents(Constants.STYLE_TYPE);
    return elements
      .map((element) => element.className.split(' ')
      .filter((className) => className !== ''))
      // About this reduce:
      // no initial value so the first element in the array will be used, it
      // will start with the 2nd element keep only the styles defined in the
      // style editor to array of class names in common to all selected elements
      // from array of elements to array of array of classNames
      .reduce((prev, classNames) => {
        return prev.filter((prevClassName) => classNames.indexOf(prevClassName) > -1);
      })
      .filter((className) => allStyles.find((style: StyleData) => style.className === className));
  }

  /**
   * redraw the properties
   * @param states the elements currently selected
   * @param pageNames   the names of the pages which appear in the current HTML file
   * @param  currentPageName   the name of the current page
   */
  redraw(states: SelectableState[], pageNames: string[], currentPageName: string) {
    super.redraw(states, pageNames, currentPageName);

    // mobile mode
    this.mobileOnlyCheckbox.checked = this.isMobile();

    // edit the style of the selection
    if (states.length > 0) {
      // get the selected elements style, i.e. which style applies to them
      const selectionStyle = (() => {
        // get the class names common to the selection
        const classNames = this.getStyles(states.map((state) => state.el));

        // choose the style to edit
        if (classNames.length >= 1) {
          return classNames[0];
        }
        return Constants.BODY_STYLE_CSS_CLASS;
      })();
      this.updateStyleList(selectionStyle);

      // show text styles only when a text box is selected
      const onlyTexts = this.states.length > 0
        && this.states.filter((state) => this.model.element.getType(state.el) !== Constants.TYPE_TEXT).length === 0;
      if (onlyTexts) {
        this.element.classList.remove('style-editor-notext');
      } else {
        this.element.classList.add('style-editor-notext');
      }
    } else {
      // FIXME: no need to recreate the whole style list every time the
      // selection changes
      this.updateStyleList(Constants.BODY_STYLE_CSS_CLASS);
      // show the text styles in the case of "all style" so that the user can edit text styles, even when no text box is selected
      this.element.classList.remove('style-editor-notext');
    }
  }

  /**
   * update the list of styles
   * @param styleName: option to select, or null for hide editor or
   *     `Component.EMPTY_STYLE_CLASS_NAME` for add an empty selection and
   *     select it
   */
  updateStyleList(styleName: StyleName) {
    // reset the combo box
    this.styleCombo.innerHTML = '';

    // add all the existing styles to the dropdown list

    // append options to the dom
    (styleName === Constants.EMPTY_STYLE_CLASS_NAME ? [{
      className: Constants.EMPTY_STYLE_CLASS_NAME,
      displayName: Constants.EMPTY_STYLE_DISPLAY_NAME,
    }] : [])
    .concat(this.model.component.getProdotypeComponents(Constants.STYLE_TYPE) as Array<{className: string, displayName: string}>)
    .map((obj) => {
      // create the combo box option
      const option = document.createElement('option');
      option.value = obj.className;
      option.innerHTML = obj.displayName;
      return option;
    })
    .forEach((option) => this.styleCombo.appendChild(option));
    if (styleName != null ) {
      const styleNameNotNull = (styleName as StyleName);

      // set the new selection
      this.styleCombo.value = (styleNameNotNull as string);

      this.element.classList.remove('no-style');

      // populate combos
      const styleData = (this.model.property.getStyleData(styleNameNotNull) || {} as StyleData);
      this.populatePseudoClassCombo(styleData);
      this.pseudoClassCombo.disabled = false;

      // store prev value
      if (this.styleComboPrevValue !== styleNameNotNull) {
        // reset state
        this.pseudoClassCombo.selectedIndex = 0;
      }
      this.styleComboPrevValue = styleNameNotNull;

      // start editing the style with prodotype
      this.controller.editMenuController.editStyle(styleNameNotNull, this.getPseudoClass(), this.getVisibility());

      // update selection count
      const total = this.getElementsWithStyle(styleNameNotNull, true).length;
      const onPage = total === 0 ?
          0 :
          this.getElementsWithStyle(styleNameNotNull, false).length;
      this.selectionCountPage.innerHTML =
          `${onPage} on this page (<span>select</span>),&nbsp;`;
      this.selectionCountTotal.innerHTML =
          `${total} total (<span>select</span>)`;

      // update tags buttons
      this.updateTagButtonBar(styleData);
    } else {
      this.element.classList.add('no-style');
    }
  }

  /**
   * mark tags push buttons to show which tags have styles
   */
  updateTagButtonBar(styleData: StyleData) {
    const visibilityData = (styleData.styles || {})[this.getVisibility()] || {};
    const tagData = visibilityData[this.getPseudoClass()] || {};
    Array.from(this.element.querySelectorAll('[data-prodotype-name]'))
    .forEach((el: HTMLElement) => {
      const tagName = el.getAttribute('data-prodotype-name');
      const label = el.getAttribute('data-initial-value') + (tagData[tagName] ? ' *' : '');
      if (el.innerHTML !== label) {
        el.innerHTML = label;
      }
    });
  }

  /**
   * useful to mark combo elements with "*" when there is data there
   */
  populatePseudoClassCombo(styleData: StyleData) {
    const visibilityData = (styleData.styles || {})[this.getVisibility()];

    // populate pseudo class combo
    const selectedIndex = this.pseudoClassCombo.selectedIndex;
    this.pseudoClassCombo.innerHTML = '';

    // get the list of pseudo classes out of prodotype definition
    // {"name":"Text
    // styles","props":[{"name":"pseudoClass","type":["normal",":hover",":focus-within",
    // ...
    const componentsDef = this.model.component.getComponentsDef(Constants.STYLE_TYPE);
    const pseudoClasses = componentsDef.text.props.filter((prop) => prop.name === 'pseudoClass')[0].type;

    // append options to the dom
    pseudoClasses
        .map((pseudoClass) => {
          // create the combo box options
          const option = document.createElement('option');
          option.value = pseudoClass;
          option.innerHTML = pseudoClass +
              (!!visibilityData && !!visibilityData[pseudoClass] ? ' *' : '');
          return option;
        })
        .forEach((option) => this.pseudoClassCombo.appendChild(option));

    // keep selection
    this.pseudoClassCombo.selectedIndex = selectedIndex;
  }

  /**
   * @return normal if pseudo class is ''
   */
  getPseudoClass(): string {
    return this.pseudoClassCombo.value === '' ? 'normal' :
                                                this.pseudoClassCombo.value;
  }

  /**
   * utility function to create a style in the style combo box or duplicate one
   */
  createStyle(opt_data?: StyleData, opt_cbk?: ((p1?: string) => any)) {
    const noBody = this.states.filter((state) => state.el !== this.model.body.getBodyElement());
    if (noBody.length <= 0) {
      SilexNotification.alert('Create a style', 'Error: you need to select at least 1 element for this action.', () => {});
    } else {
      SilexNotification.prompt('Create a style', 'Enter a name for your style!', opt_data ? opt_data.displayName : '', 'Your Style', (accept, name) => {
        if (accept && name && name !== '') {
          this.controller.propertyToolController.undoCheckPoint();
          const className = 'style-' + name.replace(/ /g, '-').toLowerCase();
          this.model.component.initStyle(name, className, opt_data);
          this.applyStyle(noBody.map((state) => state.el), className);

          // FIXME: needed to select className but
          // model.Component::initStyle calls refreshView which calls
          // updateStyleList
          this.updateStyleList(className);
          if (opt_cbk) {
            opt_cbk(name);
          }
          this.controller.propertyToolController.refreshView();
        }
      });
    }
  }

  /**
   * utility function to delete a style in the style
   * @param opt_confirm, default is true, if false it will skip user
   *     confirmation popin
   */
  deleteStyle(name: string, opt_confirm?: boolean) {
    if (opt_confirm === false) {
      this.doDeleteStyle(name);
    } else {
      if (name === Constants.BODY_STYLE_CSS_CLASS) {
        SilexNotification.alert('Delete a style', `
          The style '${Constants.BODY_STYLE_NAME}' is a special style, you can not delete it.
        `, () => {});
      } else {
        SilexNotification.confirm('Delete a style', `
          I am about to delete the style <b>${name}</b>!<br><br>Are you sure?
        `, (accept) => {
          if (accept) {
            this.doDeleteStyle(name);
          }
        });
      }
    }
  }

  /**
   * utility function to delete a style in the style
   */
  private doDeleteStyle(name: string) {
    const option =
        this.styleCombo.querySelector('option[value="' + name + '"]');

    // undo checkpoint
    this.controller.propertyToolController.undoCheckPoint();

    // remove from elements
    Array.from(this.model.file.getContentDocument().querySelectorAll('.' + name))
    .filter((el) => el !== this.model.body.getBodyElement())
    .forEach((el: HTMLElement) => el.classList.remove(name));

    // undo checkpoint
    this.controller.settingsDialogController.undoCheckPoint();

    // remove from model
    this.model.component.removeStyle(option.value);
    this.styleCombo.removeChild(option);
    this.controller.propertyToolController.refreshView();
  }
}
