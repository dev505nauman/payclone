import * as express from 'express';
import * as nodeModules from 'node_modules-path';
import * as Path from 'path';
import * as serveStatic from 'serve-static';
import { StaticOptions } from '../ServerConfig';

export default function(staticOptions: StaticOptions) {
  const router = express.Router();
  // add static folders to serve published files
  router.use('/', serveStatic(Path.join(__dirname, '../../../../dist/html')));
  router.use('/', serveStatic(Path.join(__dirname, '../../../../dist/client')));
  router.use('/js', serveStatic(Path.join(__dirname, '../../../../dist/client')));
  router.use('/assets', serveStatic(Path.join(__dirname, '../../../../dist/public/assets')));
  router.use('/css', serveStatic(Path.join(__dirname, '../../../../dist/public/css')));
  router.use('/prodotype', serveStatic(Path.join(__dirname, '../../../../dist/prodotype')));
  // the scripts which have to be available in all versions (v2.1, v2.2, v2.3, ...)
  router.use('/static', serveStatic(Path.join(__dirname, '../../../../static')));
  // wysihtml
  router.use('/libs/wysihtml', serveStatic(Path.resolve(nodeModules('wysihtml'), 'wysihtml/parser_rules')));
  router.use('/libs/wysihtml', serveStatic(Path.resolve(nodeModules('wysihtml'), 'wysihtml/dist/minified')));
  // js-beautify
  router.use('/libs/js-beautify', serveStatic(Path.resolve(nodeModules('js-beautify'), 'js-beautify/js/lib')));
  // code editor
  // router.use('/libs/monaco-editor', serveStatic(Path.resolve(nodeModules('monaco-editor'), 'monaco-editor/esm/vs/editor/')));
  // // normalize.css
  // router.use('/libs/normalize.css', serveStatic(Path.resolve(nodeModules('normalize.css'), 'normalize.css')));
  // font-awesome
  router.use('/libs/font-awesome/css', serveStatic(Path.resolve(nodeModules('font-awesome'), 'font-awesome/css')));
  router.use('/libs/font-awesome/fonts', serveStatic(Path.resolve(nodeModules('font-awesome'), 'font-awesome/fonts')));
  // ejs and prodotype
  router.use('/libs/prodotype', serveStatic(Path.resolve(nodeModules('prodotype'), 'prodotype/pub')));
  // styles for tags-input component
  router.use('/libs/tags-input', serveStatic(Path.resolve(nodeModules('tags-input'), 'tags-input')));
  // templates
  router.use('/libs/templates/silex-templates', serveStatic(Path.resolve(nodeModules('silex-templates'), 'silex-templates')));
  router.use('/libs/templates/silex-blank-templates', serveStatic(Path.resolve(nodeModules('silex-blank-templates'), 'silex-blank-templates')));

  return router;
}
