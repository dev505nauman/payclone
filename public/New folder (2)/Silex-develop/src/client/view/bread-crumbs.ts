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
 * @fileoverview
 * the Silex bread crumbs, which displays the selection's containers
 *
 */

import {Controller} from '../types';
import {Model} from '../types';
import {InvalidationManager} from '../utils/invalidation-manager';

/**
 * @param element   container to render the UI
 * @param model  model class which holds
 * the model instances - views use it for read
 * operation only
 * @param controller  structure which holds
 * the controller instances
 */
export class BreadCrumbs {
  /**
   * invalidation mechanism
   */
  invalidationManager: InvalidationManager;

  constructor(public element: HTMLElement, public model: Model, public controller: Controller) {
    this.invalidationManager = new InvalidationManager(500);
  }

  /**
   * to be consistent with views
   * called by the app constructor
   */
  buildUi() {}

  /**
   * the selection has changed
   * called by silex.model.Body
   * @param opt_selectedElements the selected elements
   * @param opt_pageNames   the names of the pages
   * @param  opt_currentPageName   the name of the current page
   */
  redraw(
      opt_selectedElements?: HTMLElement[], opt_pageNames?: string[],
      opt_currentPageName?: string) {
    this.invalidationManager.callWhenReady(() => {
      // get the selection if not provided
      opt_selectedElements = opt_selectedElements ?
          opt_selectedElements :
          this.model.body.getSelection();

      // clone the selection array in order to avoid side effects after
      // manipulating the array
      const selectedElements = [];
      opt_selectedElements.forEach((element) => selectedElements.push(element));

      // get the common ancesters to all selected elements
      function getParents(elem) {
        const parents = [];
        while (elem && elem.tagName !== 'HTML') {
          parents.unshift(elem);
          elem = elem.parentElement;
        }
        return parents;
      }

      // find the selected element which is the "deepest" in the dom, i.e. has
      // the greater number of parent nodes
      selectedElements.sort(
          (elem1, elem2) =>
              getParents(elem2).length - getParents(elem1).length);
      const deepest = selectedElements.shift();

      // for this "deepest" element, find the common ancestors with all others
      let ancestors = getParents(deepest);
      selectedElements.forEach((element) => {
        const parents = getParents(element);
        const newAncestors = [];
        let idx = 0;
        while (idx < ancestors.length && idx < parents.length &&
               ancestors[idx] === parents[idx]) {
          newAncestors.push(ancestors[idx++]);
        }
        ancestors = newAncestors;
      });

      // empty current bread crumbs
      while (this.element.childNodes.length) {
        this.removeCrumb((this.element.childNodes[0] as HTMLElement));
      }

      // create a button for each ancester
      ancestors.forEach((ancestor) => this.addCrumb(ancestor));
    });
  }

  /**
   * add a button in the bread crumb container
   */
  addCrumb(ancestor: HTMLElement) {
    const crumb = document.createElement('DIV');
    let cssClasses = this.model.element.getClassName(ancestor);
    if (cssClasses !== '') {
      cssClasses = '.' + cssClasses.split(' ').join('.');
    }
    const displayName = ancestor.tagName.toLowerCase() === 'body' ? 'Body' :
      this.model.component.isComponent(ancestor) ? 'Component' : this.model.element.getDisplayName(ancestor);
    crumb.classList.add('crumb');
    crumb.innerHTML = displayName + cssClasses;
    crumb.style.zIndex = (100 - this.element.childNodes.length).toString();
    this.element.appendChild(crumb);
    crumb.onclick = () => this.model.body.setSelection([ancestor]);
    const svg = '<svg class="svg" viewBox="0 0 7 28" height="28" width="7"><path d="M.5 0l6 14-6 14H7V0z" fill="currentColor"></path><path d="M1 0H0l6 14-6 14h1l6-14z" fill="#858585"></path></svg>';
    const sep = document.createElement('DIV');
    sep.classList.add('sep');
    sep.innerHTML = svg;
    this.element.appendChild(sep);
  }

  /**
   * remove events and deletes a bread crumb
   */
  removeCrumb(crumb: HTMLElement) {
    this.element.removeChild(crumb);
  }
}
