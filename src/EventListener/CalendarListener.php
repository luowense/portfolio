<?php


namespace App\EventListener;

use App\Entity\EventUser;
use App\Repository\EventUserRepository;
use CalendarBundle\Entity\Event;
use CalendarBundle\Event\CalendarEvent;


class CalendarListener
{
    private $eventUserRepository;

    public function __construct(EventUserRepository $eventUserRepository)
    {
        $this->eventUserRepository = $eventUserRepository;
    }

    public function load(CalendarEvent $calendar)
    {
        $start = $calendar->getStart();
        $end = $calendar->getEnd();
        $filters = $calendar->getFilters();


        $userEvents = $this->eventUserRepository
            ->createQueryBuilder('eventUser')
            ->where('eventUser.beginAt BETWEEN :start and :end')
            ->setParameter('start', $start->format('Y-m-d H:i:s'))
            ->setParameter('end', $end->format('Y-m-d H:i:s'))
            ->getQuery()
            ->getResult();

        foreach($userEvents as $event) {
            $userEvent = new Event(
                $event->getTitle(),
                $event->getBeginAt(),
                $event->getEndAt()
            );

            $userEvent->setOptions([
                'backgroundColor' => 'red',
                'boderColor' => 'red'
            ]);

            $calendar->addEvent($userEvent);

        }
    }
}
