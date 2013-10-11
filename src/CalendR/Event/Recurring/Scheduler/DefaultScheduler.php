<?php

namespace CalendR\Event\Recurring\Scheduler;

use CalendR\Event\Recurring\EventOccurence;
use CalendR\Event\Recurring\RecurringEventInterface;
use CalendR\Period\PeriodInterface;

/**
 * A concrete implementation of recurring event scheduler
 *
 * @author Yohan Giarelli <yohan@frequence-web.fr>
 */
class DefaultScheduler implements SchedulerInterface
{
    /**
     * {@inheritDoc}
     */
    public function findOccurences(RecurringEventInterface $recurring, PeriodInterface $period)
    {
        $events = array();
        $begin  = clone $recurring->getBegin();
        $end    = clone $recurring->getEnd();

        while ($begin < $period->getEnd() && (null === $recurring->getRecurringEnd() || $begin <= $recurring->getRecurringEnd())) {
            $event = new EventOccurence($recurring, clone $begin, clone $end);

            if ($event->getBegin() >= $period->getBegin()) {
                $events[] = $event;
            }

            $begin->add($recurring->getRecurringInterval());
            $end->add($recurring->getRecurringInterval());
        }

        return $events;
    }
}
