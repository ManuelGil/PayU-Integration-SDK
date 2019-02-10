<div align="center">
	<h1> PayU Integration SDK </h1>
</div>

<div align="center">
	<a href="#changelog">
		<img src="https://img.shields.io/badge/stability-stable-green.svg" alt="Status">
	</a>
	<a href="#changelog">
		<img src="https://img.shields.io/badge/release-v0.0.0.3-blue.svg" alt="Version">
	</a>
	<a href="#changelog">
		<img src="https://img.shields.io/badge/update-february-yellowgreen.svg" alt="Update">
	</a>
	<a href="#license">
		<img src="https://img.shields.io/badge/license-MS--PL%20License-green.svg" alt="License">
	</a>
</div>

<a name="started"></a>
## :traffic_light: Getting Started

Integrate your application with the PayU platform. Create a connector using the
 [PayU Latam Payments PHP SDK](https://github.com/developers-payu-latam/payu-latam-php-payments-sdk)
 and use that connector to connect to the PayU ecosystem.

<a name="requirements"></a>
### Requirements

  * PHP 5.2.1 or greater
  * cURL extension
  * XML extension
  * mbstring extension
  * JSON extension

<a name="installation"></a>
### Installation

#### Copy this project

  1. Clone or Download this repository
  2. Unzip the archive if needed
  3. Copy the folder in the htdocs dir
  4. Start a Text Editor (Atom, Sublime, Visual Studio Code, Vim, etc)
  5. Add the project folder to the editor

#### Install the project

  1. Go to htdocs dir

  * Windows

```bash
$ cd /d C:\xampp\htdocs
```

  * Linux

```bash
$ cd /opt/lampp/htdocs
```

  * MAC

```bash
$ cd applications/mamp/htdocs
```

  2. Go to the project folder

```bash
$ cd PayU-Integration-SDK
```

  3. Install with composer

```bash
$ composer install
```

  Or

```bash
$ sudo php composer.phar install
```

#### Configure the project

  Copy the [`.env.example`](https://github.com/ManuelGil/PayU-Integration-SDK/blob/master/.env.example)
 file and call it `.env`.

  Change the database configuration in the new file.

<a name="deployment"></a>
## :package: Deployment

### Installing cURL extension

  1. Install cURL

```bash
$ sudo apt-get install curl
```

  2. Restart Apache

```bash
$ sudo service apache2 restart
```

  3. Install PHP CURL

  * PHP 7.2:

```bash
$ sudo apt-get install php7.2-curl
```

  * PHP 7.1:

```bash
$ sudo apt-get install php7.1-curl
```

  * PHP 7.0:

```bash
$ sudo apt-get install php7.0-curl
```

  * PHP 5.6:

```bash
$ sudo apt-get install php5.6-curl
```

  * PHP 5.5:

```bash
$ sudo apt-get install php5.5-curl
```

  4. Restart Apache

```bash
$ sudo service apache2 restart
```

### Installing XML extension

  3. Install PHP XML

  * PHP 7.2:

```bash
$ sudo apt-get install php7.2-xml
```

  * PHP 7.1:

```bash
$ sudo apt-get install php7.1-xml
```

  * PHP 7.0:

```bash
$ sudo apt-get install php7.0-xml
```

  * PHP 5.6:

```bash
$ sudo apt-get install php5.6-xml
```

  * PHP 5.5:

```bash
$ sudo apt-get install php5.5-xml
```

  4. Restart Apache

```bash
$ sudo service apache2 restart
```

### Routes

  * `post` => `/payments` - This method is used for testing the api. e.g.:

    > uri = `/public/payments`

<a name="test"></a>
## :100: Running the tests

Use `[index.html](https://github.com/ManuelGil/PayU-Integration-SDK/blob/master/index.html)` for testing.

<a name="built"></a>
## :wrench: Built With

  * Visual Studio Code ([VSCode](https://code.visualstudio.com/))
  * COMPOSER ([COMPOSER](https://getcomposer.org/))

<a name="changelog"></a>
## :information_source: Changelog

**0.0.0.3** (02/10/2019)

  * <table border="0" cellpadding="4">
		<tr>
			<td>
				<strong>Language:</strong>
			</td>
			<td>
				PHP
			</td>
		</tr>
		<tr>
			<td>
				<strong>Changes:</strong>
			</td>
			<td>
				<ul>
					<li>
						Change the 'Payments' route to POST method
					</li>
					<li>
						Separate the payment controller
					</li>
				</ul>
			</td>
		</tr>
	</table>

**0.0.0.2** (02/09/2019)

  * <table border="0" cellpadding="4">
		<tr>
			<td>
				<strong>Language:</strong>
			</td>
			<td>
				PHP
			</td>
		</tr>
		<tr>
			<td>
				<strong>Changes:</strong>
			</td>
			<td>
				<ul>
					<li>
						Composer Installation
					</li>
					<li>
						PSR-4 Integration
					</li>
					<li>
						Monolog Integration
					</li>
				</ul>
			</td>
		</tr>
	</table>

**0.0.0.1** (02/07/2019)

  * <table border="0" cellpadding="4">
		<tr>
			<td>
				<strong>Language:</strong>
			</td>
			<td>
				PHP
			</td>
		</tr>
		<tr>
			<td>
				<strong>Changes:</strong>
			</td>
			<td>
				<ul>
					<li>
						Initial commit
					</li>
				</ul>
			</td>
		</tr>
	</table>

<a name="authors"></a>
## :eyeglasses: Authors

  * **Manuel Gil** - *Owner* - [ManuelGil](https://github.com/ManuelGil) 

See also the list of [contributors](https://github.com/ManuelGil/PayU-Integration-SDK/contributors)
 who participated in this project.

<a name="license"></a>
## :memo: License

This API is licensed under the MIT License - see the
 [MIT License](https://opensource.org/licenses/MIT) for details.