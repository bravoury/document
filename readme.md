Lavalite package that provides document management facility for the cms.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `litecms/document`.

    "litecms/document": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

    Litecms\Document\Providers\DocumentServiceProvider::class,

And also add it to alias

    'Document'  => Litecms\Document\Facades\Document::class,

## Publishing files and migraiting database.

**Migration and seeds**

    php artisan migrate
    php artisan db:seed --class=Litecms\\DocumentTableSeeder

**Publishing configuration**

    php artisan vendor:publish --provider="Litecms\Document\Providers\DocumentServiceProvider" --tag="config"

**Publishing language**

    php artisan vendor:publish --provider="Litecms\Document\Providers\DocumentServiceProvider" --tag="lang"

**Publishing views**

    php artisan vendor:publish --provider="Litecms\Document\Providers\DocumentServiceProvider" --tag="view"


## Usage


