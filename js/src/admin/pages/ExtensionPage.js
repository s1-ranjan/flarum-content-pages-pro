import app from 'flarum/admin/app';
import Page from 'flarum/common/components/Page';
import Button from 'flarum/common/components/Button';

export default class ExtensionPage extends Page {
  oninit(vnode) {
    super.oninit(vnode);

    this.pages = [];
    this.loading = true;

    app.request({
      method: 'GET',
      url: app.forum.attribute('apiUrl') + '/content-pages'
    }).then(result => {
      this.pages = result;
      this.loading = false;
      m.redraw();
    });
  }

  view() {
    if (this.loading) {
      return <div className="container">Loading...</div>;
    }

    return (
      <div className="container">
        <h2>Content Pages</h2>

        <Button className="Button Button--primary" onclick={() => this.createPage()}>
          New Page
        </Button>

        <ul>
          {this.pages.map(page => (
            <li>
              <b>{page.title}</b> – /{page.slug}
            </li>
          ))}
        </ul>
      </div>
    );
  }

  createPage() {
    const title = prompt("Page title");
    const slug = prompt("Slug (url)");

    if (!title || !slug) return;

    app.request({
      method: 'POST',
      url: app.forum.attribute('apiUrl') + '/content-pages',
      body: {
        data: {
          attributes: {
            title,
            slug,
            content: "<p>New page</p>"
          }
        }
      }
    }).then(() => {
      location.reload();
    });
  }
}
