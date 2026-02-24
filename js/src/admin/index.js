import app from 'flarum/admin/app';
import PagesApp from './PagesApp';

app.initializers.add('s1ranjan-pages', () => {

  app.extensionData
    .for('s1ranjan-pages')
    .registerPage(PagesApp);

});
