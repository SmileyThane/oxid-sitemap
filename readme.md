# Google Sitemap Exporter
[![Latest Version on Packagist](https://img.shields.io/packagist/v/smileythane/oxid-sitemap.svg?style=flat-square)](https://packagist.org/packages/smileythane/oxid-sitemap)
[![Total Downloads](https://img.shields.io/packagist/dt/smileythane/oxid-sitemap.svg?style=flat-square)](https://packagist.org/packages/smileythane/oxid-sitemap)


## Requirements
- Oxid eShop >= 6.2
- PHP >= 7.* | 8.*

## Installation

Install via composer:

    composer require smileythane/oxid-sitemap

Activate the plugin:

    vendor/bin/oe-console oe:module:activate smileythane_sitemap

## Usage
Recommended is usage as console command.
### Console
Run:

    vendor/bin/oe-console smileythane:sitemap:generate

## License

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

[link-travis]: https://travis-ci.org/smileythane/oxid-sitemap
[ico-travis]: https://img.shields.io/travis/smileythane/oxid-sitemap/master.svg?style=flat-square
