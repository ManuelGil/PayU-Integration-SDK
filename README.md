<div align="center">
	<h1> PayU Integration SDK </h1>
</div>

<div align="center">
	<a href="#changelog">
		<img src="https://img.shields.io/badge/stability-stable-green.svg" alt="Status">
	</a>
	<a href="#changelog">
		<img src="https://img.shields.io/badge/release-v0.0.0.4-blue.svg" alt="Version">
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

  * `post` => `/payments` - This method is used for make payments. e.g.:

    > uri = `http://localhost/PayU-Integration-SDK/public/payments`

```php
  args = [
    // Enter the reference code here.
    string	$referenceCode				=>	"payment_test_00000001",
    // Enter the description here.
    string	$description    			=>	"payment test",
    // Enter the value here.
    string	$amount          			=>	"20000",
    // Enter the value of the VAT (Value Added Tax only valid for Colombia) of the transaction,
    // if no VAT is sent, the system will apply 19% automatically. It can contain two decimal digits.
    // Example 19000.00. In case you have no VAT you should fill out 0.
    string	$tax             			=>	"3193",
    // Enter the value of the base value on which VAT (only valid for Colombia) is calculated.
    // If you do not have VAT should be sent to 0.
    string	$taxReturnBase				=>	"16806",
    // Enter the currency here.
    string	$currency        			=>	"COP",
    // Enter the name of the buyer here.
    string	$buyerName    				=>	"First name and second buyer name",
    // Enter the email of the buyer here.
    string	$buyerEmail      			=>	"buyer_test@test.com",
    // Enter the telephone number of the buyer here.
    string	$buyerPhone      			=>	"7563126",
    // Enter the contact document of the buyer here.
    string	$buyerDocument   			=>	"5415668464654",
    // Enter the name of the payer here.
    string	$payerName   				=>	"APPROVED",
    // Enter the email of the payer here.
    string	$payerEmail      			=>	"payer_test@test.com",
    // Enter the telephone number of the payer here.
    string	$payerPhone      			=>	"7563126",
    // Enter the contact document of the payer here.
    string	$payerDocument   			=>	"5415668464654",
    // Enter the address of the payer here.
    string	$shippingAddress			=>	"calle 100",
    string	$shippingCity				=>	"Bogota",
    string	$shippingState				=>	"Bogota",
    string	$shippingCountry			=>	"CO",
    string	$shippingPostalCode			=>  "000000",
    // Enter the number of credit card here.
    string	$cardNumber					=>	"4097440000000004",
    // Enter the expiration date of the credit card here.
    string	$cardExpirationDate			=>	"2020/12",
    // Enter the security code of the credit card here.
    string	$cardSecurityCode			=>	"321",
    // Enter the credit card name here. 
    // VISA||MASTERCARD||AMEX||DINERS
    string	$paymentMethod				=>	"VISA",
    // Enter the number of installments here.
    string	$installments				=>	"1",
  ]
```


  * `get` => `/payments/banks` - This method gets the banks list for PSE Payments. e.g.:

    > uri = `http://localhost/PayU-Integration-SDK/public/payments/banks`


  * `post` => `/payments/pse` - This method is used for make PSE Payments. e.g.:

    > uri = `http://localhost/PayU-Integration-SDK/public/payments/pse`

```php
  args = [
    // Enter the reference code here.
    string	$referenceCode				=>	"payment_test_00000001",
    // Enter the description here.
    string	$description				=>	"payment test",
    // Enter the value here.
    string	$amount						=>	"20000",
    // Enter the value of the VAT (Value Added Tax only valid for Colombia) of the transaction,
    // if no VAT is sent, the system will apply 19% automatically. It can contain two decimal digits.
    // Example 19000.00. In case you have no VAT you should fill out 0.
    string	$tax						=>	"3193",
    // Enter the value of the base value on which VAT (only valid for Colombia) is calculated.
    // If you do not have VAT should be sent to 0.
    string	$taxReturnBase				=>	"16806",
    // Enter the currency here.
    string	$currency					=>	"COP",
    // Enter the buyer's email here.
    string	$buyerEmail					=>	"buyer_test@test.com",
    // Enter the payer's name here.
    string	$payerName					=>	"First name and second payer name",
    // Enter the payer's email here.
    string	$payerEmail					=>	"payer_test@test.com",
    // Enter the payer's contact phone here.
    string	$payerPhone					=>	"7563126",
    // Enter the bank PSE code here.
    string	$pseBank					=>	"1007",
    // Enter the person type here (Natural or legal).
    string	$personType					=>	"N",
    // Enter the payer's contact document here.
    string	$payerDocument				=>	"123456789",
    // Enter the payer’s document type here: CC, CE, NIT, TI, PP,IDC, CEL, RC, DE.
    string	$payerDocumentType			=>	"CC",
  ]
```


<a name="test"></a>
## :100: Running the tests

Use [`index.html`](https://github.com/ManuelGil/PayU-Integration-SDK/blob/master/index.html) for testing.

<a name="built"></a>
## :wrench: Built With

  * Visual Studio Code ([VSCode](https://code.visualstudio.com/))
  * COMPOSER ([COMPOSER](https://getcomposer.org/))

<a name="changelog"></a>
## :information_source: Changelog

**0.0.0.4** (02/14/2019)

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
						Add the Banks List
					</li>
					<li>
						Add PSE Payments
					</li>
				</ul>
			</td>
		</tr>
	</table>

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