const config = require('flarum-webpack-config');

module.exports = [
  config({
    entry: './src/admin/index.js',
    output: 'admin.js'
  }),

  config({
    entry: './src/forum/index.js',
    output: 'forum.js'
  })
];
