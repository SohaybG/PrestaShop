<?php
/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to https://devdocs.prestashop.com/ for more information.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 */

declare(strict_types=1);

namespace PrestaShop\PrestaShop\Adapter\Product\Converter;

use PrestaShop\PrestaShop\Core\Domain\Product\Stock\ValueObject\OutOfStockType;
use Product as LegacyProduct;

class OutOfStockTypeConverter
{
    /**
     * @param string $outOfStockType
     *
     * @return int
     */
    public static function convertToLegacy(string $outOfStockType): int
    {
        switch ($outOfStockType) {
            case OutOfStockType::OUT_OF_STOCK_AVAILABLE:
                return LegacyProduct::AVAILABLE_OUT_OF_STOCK_TYPE;
            case OutOfStockType::OUT_OF_STOCK_NOT_AVAILABLE:
                return LegacyProduct::NOT_AVAILABLE_OUT_OF_STOCK_TYPE;
            case OutOfStockType::OUT_OF_STOCK_DEFAULT:
            default:
                return LegacyProduct::DEFAULT_OUT_OF_STOCK_TYPE;
        }
    }

    /**
     * @param int $legacyPackStockType
     *
     * @return string
     */
    public static function convertToValueObject(int $legacyPackStockType): string
    {
        switch ($legacyPackStockType) {
            case LegacyProduct::AVAILABLE_OUT_OF_STOCK_TYPE:
                return OutOfStockType::OUT_OF_STOCK_AVAILABLE;
            case LegacyProduct::NOT_AVAILABLE_OUT_OF_STOCK_TYPE:
                return OutOfStockType::OUT_OF_STOCK_NOT_AVAILABLE;
            case LegacyProduct::DEFAULT_OUT_OF_STOCK_TYPE:
            default:
                return OutOfStockType::OUT_OF_STOCK_DEFAULT;
        }
    }
}
