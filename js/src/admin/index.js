import app from 'flarum/admin/app';
import ExtensionPage from './pages/ExtensionPage';

app.initializers.add('s1ranjan-content-pages', () => {
  app.extensionData
    .for('s1ranjan-content-pages')
    .registerPage(ExtensionPage);
});
