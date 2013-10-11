<?php

namespace CalendR\Event\Recurring;

use CalendR\Event\EventInterface;

/**
 * An event wich have multiple occurences over time
 *
 * @author Yohan Giarelli <yohan@frequence-web.fr>
 */
interface RecurringEventInterface extends EventInterface
{
    /**
     * Returns the end of possible recurring period
     *
     * @return \DateTime|null
     */
    public function getRecurringEnd();

    /**
     * Return a date interval that match the time between 2 occurences of this event
     *
     * @return \DateInterval
     */
    public function getRecurringInterval();
}
