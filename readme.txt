=== ACF JSON Field For Contact Form 7 ===
Contributors: jamiewarb
Tags: advanced custom fields, contact form 7, json, rest, api, acf, cf7, contact form, forms
Requires at least: 4.4
Tested up to: 5.3
Stable tag: 1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Adds a 'Contact Form 7' field type for the Advanced Custom Fields WordPress plugin which returns JSON form data.

== Description ==

Adds a 'Contact Form 7' field type for the Advanced Custom Fields WordPress plugin which returns JSON form data.

Store one or multiple contact forms in an advanced custom field.

Mark one or more forms as disabled to prevent them from being selected.

Field is returned as JSON, for use with the REST API.

= Compatibility =

This ACF field type is compatible with:
* ACF 5

== Installation ==

1. Copy the `acf-json-contact-form-7` folder into your `wp-content/plugins` folder.
2. Activate the Advanced Custom Fields: JSON Contact Form 7 Field plugin via the plugins admin page.
3. Create a new field via ACF and select the JSON Contact Form 7 type.

== Frequently Asked Questions ==

= How to use =

When ACF data is returned in the REST API (such as through the ACF to REST API plugin), data for the contact form
selected will also be returned. This will be in JSON, and will look like the following:

```js
"form": {
    "id": 876,
    "title": "Contact form",
    "form": "[select* enquiry-type \"Sales\" \"Technical Support\"]\n[text* first-name]\n[text* last-name]\n[email* email]\n[text subject]\n[textarea message]\n[submit \"Send\"]"
}
```

= Get in touch =

We would love to hear from you at <a href="mailto:opensource@hexdigital.com">opensource@hexdigital.com</a>

== Changelog ==

= 1.0 =
* Initial Release.
