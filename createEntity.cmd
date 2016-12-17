del /Q src\Acme\MobileBundle\Entity\*
php app/console doctrine:mapping:import AcmeMobileBundle
php app/console doctrine:mapping:convert annotation ./src
php app/console doctrine:generate:entities Acme
