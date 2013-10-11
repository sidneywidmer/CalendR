<?php

namespace CalendR\Test\Event\Recurring\Scheduler;

use CalendR\Event\Recurring\RecurringEventInterface;
use CalendR\Event\Recurring\Scheduler\DefaultScheduler;
use CalendR\Period\PeriodInterface;

/**
 *
 *
 * @author Yohan Giarelli <yohan@frequence-web.fr>
 */
class DefaultSchedulerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DefaultScheduler
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new DefaultScheduler;
    }

    /**
     * @dataProvider occurencesDataProvider
     */
    public function testItReturnsGoodOccurences(RecurringEventInterface $recurring, PeriodInterface $period, array $expecteds)
    {
        $occurences = $this->object->findOccurences($recurring, $period);
        $this->assertCount(count($expecteds), $occurences);
        foreach ($occurences as $i => $occurence) {
            $this->assertEquals($expecteds[$i][0], $occurence->getBegin());
            $this->assertEquals($expecteds[$i][1], $occurence->getEnd());
        }
    }

    public function occurencesDataProvider()
    {
        $testData = array();

        $event     = $this->getMock('CalendR\Event\Recurring\RecurringEventInterface');
        $period    = $this->getMock('CalendR\Period\PeriodInterface');
        $expecteds = array();
        foreach (range(1, 12) as $month) {
            $expecteds[] = array(
                new \DateTime(sprintf('2013-%s-01 00:00:00', str_pad($month, 2, '0', STR_PAD_LEFT))),
                new \DateTime(sprintf('2013-%s-01 01:00:00', str_pad($month, 2, '0', STR_PAD_LEFT))),
            );
        }
        $event->expects($this->any())->method('getBegin')->will($this->returnValue(new \DateTime('2012-01-01 00:00:00')));
        $event->expects($this->any())->method('getEnd')->will($this->returnValue(new \DateTime('2012-01-01 01:00:00')));
        $event->expects($this->any())->method('getRecurringInterval')->will($this->returnValue(new \DateInterval('P1M')));
        $event->expects($this->any())->method('getRecurringEnd')->will($this->returnValue(null));
        $period->expects($this->any())->method('getBegin')->will($this->returnValue(new \DateTime('2013-01-01 00:00')));
        $period->expects($this->any())->method('getEnd')->will($this->returnValue(new \DateTime('2014-01-01 00:00')));
        $testData[] = array($event, $period, $expecteds);

        return $testData;
    }
}
