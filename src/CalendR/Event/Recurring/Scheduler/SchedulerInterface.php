<?php

namespace CalendR\Event\Recurring\Scheduler;

use CalendR\Event\Recurring\RecurringEventInterface;
use CalendR\Period\PeriodInterface;

/**
 * Schedule occurence of recurring events
 *
 * @author Yohan Giarelli <yohan@frequence-web.fr>
 */
interface SchedulerInterface
{
    /**
     * @param RecurringEventInterface $recurring
     * @param PeriodInterface         $period
     *
     * @return mixed
     */
    public function findOccurences(RecurringEventInterface $recurring, PeriodInterface $period);
}
