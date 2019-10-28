<?php

if ( ! function_exists('amount')) {

    /**
     * @param $amount
     * @param null $language
     * @param string $currency
     * @return string
     */
    function amount($amount, $language = null, $currency = '€')
    {
        if ($language == 'fr') {

            return number_format($amount, 2, ',', ' ') .  ' ' . $currency;

        } else {

            return $currency . ' ' . number_format($amount, 2, '.', ',');

        }
    }

}

if ( ! function_exists('pastMonths')) {

    function pastMonths($nb = 24)
    {
        $months = [];

        for ($i = 0; $i <= $nb; $i++) {

            $months[] = now()->subMonth($i);
        }

        return $months;
    }
}