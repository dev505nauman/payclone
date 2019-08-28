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

/**
 * @fileoverview A controller listens to a view element,
 *      and call the main {silex.controller.Controller} controller's methods
 *
 */
import {SilexTasks} from '../service/silex-tasks';
import {Model} from '../types';
import {View} from '../types';

import { ModalDialog } from '../view/ModalDialog';
import { getUiElements } from '../view/UiElements';
import {ControllerBase} from './controller-base';

/**
 * @param view  view class which holds the other views
 */
export class ToolMenuController extends ControllerBase {
  constructor(model: Model, view: View) {

super(model, view);
  }

  /**
   * dock panels
   * @param dock or undock
   */
  dockPanel(dock: boolean) {
    const { cssEditor, jsEditor, htmlEditor } = getUiElements();
    if (dock) {
      document.body.classList.add('dock-editors');
      this.view.propSplitter.addRight(cssEditor);
      this.view.propSplitter.addRight(jsEditor);
      this.view.propSplitter.addRight(htmlEditor);
    } else {
      document.body.classList.remove('dock-editors');
      this.view.propSplitter.remove(cssEditor);
      this.view.propSplitter.remove(jsEditor);
      this.view.propSplitter.remove(htmlEditor);

      // this is a workaround to avoid the editor to be stuck on the side
      if (ModalDialog.currentDialog.element === cssEditor) {
        this.view.cssEditor.setValue(this.view.cssEditor.getValue());
      }
      // this is a workaround to avoid the editor to be stuck on the side
      if (ModalDialog.currentDialog.element === jsEditor) {
        this.view.jsEditor.setValue(this.view.jsEditor.getValue());
      }
      // this is a workaround to avoid the editor to be stuck on the side
      if (ModalDialog.currentDialog.element === htmlEditor) {
        this.view.htmlEditor.setValue(this.view.htmlEditor.getValue());
      }
    }
  }
}
