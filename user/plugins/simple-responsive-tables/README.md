# Simple Responsive Tables Plugin


The **Simple Responsive Tables** Plugin is for [Grav CMS](http://github.com/getgrav/grav). It wraps tables in a div, enabling them to be scrolled vertically on small screens.

It wraps `<table>` HTML outputs:

```
<table>
	<tr>
	  <td>Cell 1</td>
	  <td>Cell 2</td>
	</tr>
</table>
```

with two `<div>` elements, like this:

```
<div class="simple-responsive-table">
	<div>
	  <table>
	    <tr>
	      <td>Cell 1</td>
	      <td>Cell 2</td>
	    </tr>
	  </table>
	</div>
</div>
```
It also provides basic styling to indicate that the table can be scrolled.
This functionality requires JavaScript to be enabled. Otherwise the tables are still scrollable, but it is not visually indicated.

## Installation

Installing the Simple Responsive Tables plugin can be done in one of two ways. The GPM (Grav Package Manager) installation method enables you to quickly and easily install the plugin with a simple terminal command, while the manual method enables you to do so via a zip file.

### GPM Installation (Preferred)

The simplest way to install this plugin is via the [Grav Package Manager (GPM)](http://learn.getgrav.org/advanced/grav-gpm) through your system's terminal (also called the command line).  From the root of your Grav install type:

    bin/gpm install simple-responsive-tables

This will install the Simple Responsive Tables plugin into your `/user/plugins` directory within Grav. Its files can be found under `/your/site/grav/user/plugins/simple-responsive-tables`.

### Manual Installation

To install this plugin, just download the zip version of this repository and unzip it under `/your/site/grav/user/plugins`. Then, rename the folder to `simple-responsive-tables`. You can find these files on [GitHub](https://github.com/bgartenmann/grav-plugin-simple-responsive-tables) or via [GetGrav.org](http://getgrav.org/downloads/plugins#extras).

You should now have all the plugin files under

    /your/site/grav/user/plugins/simple-responsive-tables

> NOTE: This plugin is a modular component for Grav which requires [Grav](http://github.com/getgrav/grav) and the [Error](https://github.com/getgrav/grav-plugin-error) and [Problems](https://github.com/getgrav/grav-plugin-problems) to operate.

## Configuration

Before configuring this plugin, you should copy the `user/plugins/simple-responsive-tables/simple-responsive-tables.yaml` to `user/config/plugins/simple-responsive-tables.yaml` and only edit that copy.

Here is the default configuration and an explanation of available options:

```yaml
enabled: true                # Set to false to disable this plugin completely
active: false                # Option to (de-)activate this plugin on a page
```

## Usage

After installing and enabling the plugin, it is deactivated by default.
You now can activate it on a page per page basis by setting the `active`config to `true` in the frontmatter:

```yaml
simple-responsive-tables:
    active: true
```

If you do have a lot of pages with tables you can enable the plugin for the entire site, by setting the `active` flag to `true` in `user/config/plugins/simple-responsive-tables.yaml`.  
It is also possible to deactivate the functionality on certain pages, by setting the config to `false` again in the frontmatter.

## Credits
The plugin is inspired and based on the following works:

- the article about [responsive scrollable tables](http://www.456bereastreet.com/archive/201309/responsive_scrollable_tables/) by Roger Johansson
- the [ImgCaptions](https://github.com/OleVik/grav-plugin-imgcaptions) plugin by Ole Vik.
