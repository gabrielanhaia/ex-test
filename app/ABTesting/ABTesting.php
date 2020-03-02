<?php


namespace App\ABTesting;

use App\ABTesting\Model\DesignModel;
use App\DBConectivity\Core\Orm\Manager\EntityManager;

/**
 * Class ABTesting
 *
 * Exercise number: 5
 * Title: ABTesting
 *
 * Resume: Exads would like to A/B test a number of promotional designs to see which provides the best
 * conversion rate.
 * Write a snippet of PHP code that redirects end users to the different designs based on the database
 * table below. Extend the database model as needed.
 * i.e. - 50% of people will be shown Design A, 25% shown Design B and 25% shown Design C.
 * The code needs to be scalable as a single promotion may have upwards of 3 designs to test.
 * design_id design_name split_percent
 *
 * @package App\DateCalculation
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class ABTesting
{
    /**
     * Return the design to be showed by the users.
     */
    public function redirectThePage(): array
    {
        $entityManager = new EntityManager;

        $designsOrderedByTotalAccess = $entityManager->get(
            'designs',
            [],
            ['total_access' => 'desc'],
            ['id', 'name', 'split_percentage', 'total_access']
        );

        $totalAccessAllUsers = 0;
        foreach ($designsOrderedByTotalAccess as $design) {
            $totalAccessAllUsers += $design['total_access'];
        }

        $designHigherDifferenceBetweenPercentages = null;
        foreach ($designsOrderedByTotalAccess as $designKey => $design) {
            if ($totalAccessAllUsers === 0 || $design['total_access'] === 0) {
                $currentPercentage = 0;
            } else {
                $currentPercentage = ($design['total_access'] * 100) / $totalAccessAllUsers;
            }

            $designsOrderedByTotalAccess[$designKey]['current_percentage'] = $currentPercentage;
            $designsOrderedByTotalAccess[$designKey]['difference_between_percentage'] = $currentPercentage - $design['split_percentage'];

            if (empty($designHigherDifferenceBetweenPercentages)
                || ($designsOrderedByTotalAccess[$designKey]['difference_between_percentage'] < $designHigherDifferenceBetweenPercentages['difference_between_percentage'])
            ) {
                $designHigherDifferenceBetweenPercentages = $designsOrderedByTotalAccess[$designKey];
            }
        }

        $designModel = new DesignModel;
        $designModel->setId($designHigherDifferenceBetweenPercentages['id'])
            ->setName($designHigherDifferenceBetweenPercentages['name'])
            ->setSplitPercentage($designHigherDifferenceBetweenPercentages['split_percentage'])
            ->setTotalAccess($designHigherDifferenceBetweenPercentages['total_access'] + 1);

        $entityManager->update($designModel);

        return $designHigherDifferenceBetweenPercentages;
    }
}