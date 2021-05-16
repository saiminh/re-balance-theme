const path = require('path');

module.exports = {
  mode: 'production',
  entry: './js/bundle.js',
  output: {
    filename: 'bundle_compiled.js',
    path: path.resolve(__dirname, 'js'),
  },
};