<?php

namespace CalendR\Event\Recurring;

/**
 * An occurence of recurring event
 *
 * @author Yohan Giarelli <yohan@frequence-web.fr>
 */
class EventOccurence
{
    /**
     * @var RecurringEventInterface
     */
    protected $event;

    /**
     * @var \DateTime
     */
    protected $begin;

    /**
     * @var \DateTime
     */
    protected $end;

    /**
     * @param RecurringEventInterface $initialEvent
     * @param \DateTime               $begin
     * @param \DateTime               $end
     */
    public function __construct(RecurringEventInterface $initialEvent, \DateTime $begin, \DateTime $end)
    {
        $this->event = $initialEvent;
        $this->begin = $begin;
        $this->end   = $end;
    }

    /**
     * @return \DateTime
     */
    public function getBegin()
    {
        return $this->begin;
    }

    /**
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @return \RecurringEventInterface
     */
    public function getEvent()
    {
        return $this->event;
    }
}
