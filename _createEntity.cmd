del /Q d:\Wamp\www\mobile.symf\src\Acme\MobileBundle\Entity\*
php app/console doctrine:mapping:import AcmeMobileBundle
php app/console doctrine:mapping:convert annotation ./src
php app/console doctrine:generate:entities Acme
php app/console doctrine:generate:entities AppMobileBundle