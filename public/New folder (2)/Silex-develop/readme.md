[![license: GPL](https://img.shields.io/badge/license-GPL-green.svg)](http://www.silexlabs.org/silex/silex-licensing/)
[![Build Status](https://circleci.com/gh/silexlabs/Silex.svg?style=svg)](https://circleci.com/gh/silexlabs/Silex)
[![status of silex.me instance](https://monitoshi.lexoyo.me/badge/1525963562293-6552)](https://editor.silex.me)

## About Silex, live web creation.

Silex, is a free and open source website builder in the cloud. Create websites directly in the browser without writing code. And it is suitable for professional designers to produce great websites without constraints. Silex is also known as the HTML5 editor.

Brought to you by Silex Labs team, promoting free software. Feel free to [use the free Silex instance](https://editor.silex.me/) provided by [Silex Labs foundation](https://www.silexlabs.org/).

![Silex UI](https://github.com/silexlabs/www.silex.me/raw/gh-pages/assets/silex-ui.gif)

Silex for DIY and passionate people who want a free alternative to Wix or other closed source website builders:

* [Use Silex online for free](https://editor.silex.me)
* [Silex desktop app (works offline, with your local files)](https://github.com/silexlabs/Silex/releases)
* [Silex official website](http://www.silex.me/)
* [Documentation wiki](https://github.com/silexlabs/Silex/wiki)
* [Silex forums](https://github.com/silexlabs/Silex/issues)
* [subscribe to Silex news by email (a few messages per year)](http://eepurl.com/F48q5) and follow us on [Facebook](http://www.facebook.com/silexlabs), [Twitter](https://twitter.com/silexlabs)


Silex for professionals, agencies and hosting companies:

* [Install Silex on your computer or server](https://github.com/silexlabs/Silex/wiki/How-to-Host-An-Instance-of-Silex#as-a-web-app-silex-web-version) (basically this is `npm install -g silex-website-builder && silex`)
* If you know HTML and CSS here is how to [add your own components to the "+" menu](https://github.com/silexlabs/Silex/wiki/Create-Silex-components)
* If you are a designer, here is how to [add your own templates to Silex](https://github.com/silexlabs/Silex/wiki/Create-templates-for-Silex)
* If you are a freelance designer and wants to create Silex website for clients, [please leave your email here](http://eepurl.com/gjYnib)
* If you are looking for a designer to help you create your website, [please leave your email here](http://eepurl.com/gjYnib)
* [Hire a contributor from this list](https://github.com/silexlabs/Silex/graphs/contributors) or [from one](https://github.com/silexlabs/unifile/graphs/contributors) [of these](https://github.com/silexlabs/CloudExplorer2/graphs/contributors) [other lists](https://github.com/silexlabs/drag-drop-stage-component/graphs/contributors)


Other links

* [Silex license is GPL](http://www.silexlabs.org/silex/silex-licensing/)
* [Road map](https://github.com/silexlabs/Silex/milestones)
* [Change log](https://github.com/silexlabs/Silex/pulls?utf8=%E2%9C%93&q=is%3Apr)
* [Open positions, join the team](https://github.com/silexlabs/Silex/issues?q=is%3Aissue+is%3Aopen+label%3A%22open+position%22)
* [Become a core contributor with these issues to get started](https://github.com/silexlabs/Silex/issues?q=is%3Aopen+is%3Aissue+label%3A%22good+first+issue%22)
* [Testers, docs and other help wanted annoucements](https://github.com/silexlabs/Silex/issues?q=is%3Aopen+is%3Aissue+label%3A%22help+wanted%22)

## About the git repo

[Silex source code repository](https://github.com/silexlabs/Silex/) is organized with 2 git branches:

* `master` is the stable version, you can see it in action here: [editor.silex.me](https://editor.silex.me)

* `develop` is the "preprod" or "staging" version, it is deployed on [preprod.silex.me](https://preprod.silex.me) for anyone to test (this is a good contribution, thx in advance, open an issue for each bug)

During your development, you may need to rebase your work on the latest version of Silex develop branch. To do so you can git stash your changes or commit the work in progress, and then use `git pull --rebase upstream develop` to get the latest changes of Silex repo. The rerun `npm install`

## Size of the project's code base

As of june 2017, around 100.000 lines of code. See [github API count (includes blank lines and comments I guess)](https://api.github.com/repos/silexlabs/Silex/languages):

```
JavaScript: 856643,
CSS: 82702,
HTML: 53727,
Shell: 1532
```

[cb372's report](http://line-count.herokuapp.com/silexlabs/Silex):

<table id="results" class="table table-striped">
<tbody>
    <tr>
        <th>File Type</th>
        <th>Files</th>
        <th>Lines of Code</th>
        <th>Total lines</th>
    </tr>
    <tr>
        <td>JavaScript</td>
        <td>422</td>
        <td>138797</td>
        <td>183644</td>
    </tr>
    <tr>
        <td>Json</td>
        <td>3</td>
        <td>146</td>
        <td>146</td>
    </tr>
    <tr>
        <td>Text</td>
        <td>12</td>
        <td>0</td>
        <td>1047</td>
    </tr>
    <tr>
        <td>Shell</td>
        <td>4</td>
        <td>24</td>
        <td>47</td>
    </tr>
    <tr>
        <td>Stylesheets</td>
        <td>90</td>
        <td>17777</td>
        <td>21504</td>
    </tr>
    <tr>
        <td>Html</td>
        <td>7</td>
        <td>545</td>
        <td>726</td>
    </tr>
</tbody>
</table>


[Cloc's report](https://github.com/AlDanial/cloc):

```
-------------------------------------------------------------------------------
Language                     files          blank        comment           code
-------------------------------------------------------------------------------
JavaScript                     404           9616          14937          50841
CSS                             75           1580           1652          11394
LESS                            20            141             87           1768
Markdown                        10            334              0            657
YAML                            14              3              1            581
HTML                             7            177             22            527
JSON                             3              0              0            146
Bourne Shell                     4              6             13             28
-------------------------------------------------------------------------------
SUM:                           541          12030          16712          66869
-------------------------------------------------------------------------------
```

## dependencies

These are the upstream projects we use in Silex

* [unifile](https://github.com/silexlabs/unifile), a nodejs library which provides a unified access to cloud services
* [Cloud explorer](http://cloud-explorer.org), a file manager for the cloud services. It is a front end javascript app which connects to a unifile server
* [Stage](https://github.com/silexlabs/drag-drop-stage-component), a stage component to add a drag and drop to your project
* [Prodotype](https://github.com/silexlabs/Prodotype), Build components and generate a UI to make them editable in your app
* [Resonsize](http://www.responsize.org/), preview websites at different sizes
* [Typescript](https://www.typescriptlang.org/) is used to build Silex
* [Ace](http://ace.c9.io/), an excellent code editor in javascript
* jquery is included in the sites generated by Silex
* [GLYPHICONS library of icons and symbols](http://glyphicons.com/) ([CC license](http://creativecommons.org/licenses/by/3.0/)) and [fontawesome icons](http://fontawesome.io/)
