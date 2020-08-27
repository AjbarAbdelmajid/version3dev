const path = require("path");
const fsPromises = require("fs").promises;

// blank
console.log();

// Paths
const ROOT_PATH = path.resolve(__dirname, "../..");
const SCRIPTS_COMPONENTS_DIRECTORY_PATH = path.resolve(
  ROOT_PATH,
  "assets/js/components"
);
const STYLES_COMPONENTS_DIRECTORY_PATH = path.resolve(
  ROOT_PATH,
  "assets/css/components"
);
const TEMPLATE_COMPONENTS_DIRECTORY_PATH = path.resolve(
  ROOT_PATH,
  "templates/component"
);

const logHelp = (_) => {
  console.log(
    "\x1b[36mUtilisation:\x1b[0m yarn new-component <component name> [--no-js]"
  );
  console.log(
    "\x1b[36mExemple:\x1b[0m yarn new-component 'image slider' --no-js"
  );
};

// Get component name from CLI args
const [_, __, componentName, ...flags] = process.argv;
if (!componentName) {
  console.log("⚠️    \x1b[31mPas de nom de composant\x1b[0m");

  // blank
  console.log();

  logHelp();

  // blank
  console.log();

  // Exit
  process.exit(0);
}

/**
 *
 * Create all component name cases
 *
 */
const pascalCaseComponentName = componentName
  .toLowerCase()
  .replace(/(\w)(\w*)/g, (g0, g1, g2) => g1.toUpperCase() + g2.toLowerCase())
  .replace(/ /g, "");

const kebabCaseComponentName = componentName.toLowerCase().replace(/ /g, "-");

const snakeCaseComponentName = componentName.toLowerCase().replace(/ /g, "_");

/**
 *
 * Create all paths
 *
 */
const SCRIPT_COMPONENT_PATH = path.resolve(
  SCRIPTS_COMPONENTS_DIRECTORY_PATH,
  `${pascalCaseComponentName}.js`
);
const STYLE_COMPONENT_PATH = path.resolve(
  STYLES_COMPONENTS_DIRECTORY_PATH,
  `${snakeCaseComponentName}.scss`
);
const TEMPLATE_COMPONENT_PATH = path.resolve(
  TEMPLATE_COMPONENTS_DIRECTORY_PATH,
  `${snakeCaseComponentName}.html.twig`
);

// Create script file
const createScriptFile = (_) =>
  fsPromises
    .writeFile(
      SCRIPT_COMPONENT_PATH,
      `import Component from '~/lib/Component.js'

  export default class ${pascalCaseComponentName} extends Component {
    mounted () {
      super.mounted()
    }
  }`
    )
    .then((_) => {
      console.log("🎉    \x1b[32mFichier JS créé !\x1b[0m");
    })
    .catch((err) => {
      console.log("😔    Error:", err);
    });

// Create style file
const createStyleFile = (_) =>
  fsPromises
    .writeFile(STYLE_COMPONENT_PATH, ``)
    .then((_) => {
      console.log("🎉    \x1b[32mFichier de style créé !\x1b[0m");
    })
    .catch((err) => {
      console.log("😔    Error:", err);
    });

// Create twig file
const createTemplateFile = (_) =>
  fsPromises
    .writeFile(
      TEMPLATE_COMPONENT_PATH,
      `{#
  component: ${componentName}
#}

{% set props = {}|merge(props|default({}))  %}

<section data-component="${kebabCaseComponentName}" class="${pascalCaseComponentName}-component">

  ${componentName}

</section>

  `
    )
    .then((_) => {
      console.log("🎉    \x1b[32mFichier de template créé !\x1b[0m");
    })
    .catch((err) => {
      console.log("😔    Error:", err);
    });

// All files promises
const promises = [createStyleFile(), createTemplateFile()];
if (!flags.includes("--no-js")) {
  promises.push(createScriptFile());
}

Promise.all(promises).then((_) => {
  // blank
  console.log();
});
