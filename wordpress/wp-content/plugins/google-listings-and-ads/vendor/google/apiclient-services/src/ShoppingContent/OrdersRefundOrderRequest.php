<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Automattic\WooCommerce\GoogleListingsAndAds\Vendor\Google\Service\ShoppingContent;

class OrdersRefundOrderRequest extends \Automattic\WooCommerce\GoogleListingsAndAds\Vendor\Google\Model
{
  /**
   * @var MonetaryAmount
   */
  public $amount;
  protected $amountType = MonetaryAmount::class;
  protected $amountDataType = '';
  /**
   * @var bool
   */
  public $fullRefund;
  /**
   * @var string
   */
  public $operationId;
  /**
   * @var string
   */
  public $reason;
  /**
   * @var string
   */
  public $reasonText;

  /**
   * @param MonetaryAmount
   */
  public function setAmount(MonetaryAmount $amount)
  {
    $this->amount = $amount;
  }
  /**
   * @return MonetaryAmount
   */
  public function getAmount()
  {
    return $this->amount;
  }
  /**
   * @param bool
   */
  public function setFullRefund($fullRefund)
  {
    $this->fullRefund = $fullRefund;
  }
  /**
   * @return bool
   */
  public function getFullRefund()
  {
    return $this->fullRefund;
  }
  /**
   * @param string
   */
  public function setOperationId($operationId)
  {
    $this->operationId = $operationId;
  }
  /**
   * @return string
   */
  public function getOperationId()
  {
    return $this->operationId;
  }
  /**
   * @param string
   */
  public function setReason($reason)
  {
    $this->reason = $reason;
  }
  /**
   * @return string
   */
  public function getReason()
  {
    return $this->reason;
  }
  /**
   * @param string
   */
  public function setReasonText($reasonText)
  {
    $this->reasonText = $reasonText;
  }
  /**
   * @return string
   */
  public function getReasonText()
  {
    return $this->reasonText;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrdersRefundOrderRequest::class, 'Google_Service_ShoppingContent_OrdersRefundOrderRequest');
