<?php

namespace AppBundle\Command;

use AppBundle\Entity\Medecin;
use AppBundle\Entity\Patient;
use Doctrine\ORM\EntityManager;
use PharmaIntelligence\HL7\Unserializer;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class AppHl7Command extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:hl7')
            ->setDescription('...')
            ->addArgument('argument', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /* @var $em EntityManager */
        $em = $this->getContainer()->get('doctrine')->getManager();


        $files = glob('web/files/*.txt');

        $unserializer = new Unserializer();
        $map = array(
            'MSH' => '\PharmaIntelligence\HL7\Node\Segment\MSHSegment'
        );

        foreach ($files as $file) {
            $hl7 = file_get_contents($file);
            $message = $unserializer->loadMessageFromString($hl7, $map);
            $nom = $message->getValueAtIndex(2,4);
            $prenom = $message->getValueAtIndex(2,4,0,1);
            $dateDeNaissance = $message->getValueAtIndex(2,6);
            $genre = $message->getValueAtIndex(2,7);
            $rue =$message->getValueAtIndex(2,10);
            $codePostal =$message->getValueAtIndex(2,10,0,4);
            $ville =$message->getValueAtIndex(2,10,0,2);

            $nomMedecin = $message->getValueAtIndex(5,3,0,1);
            $prenomMedecin = $message->getValueAtIndex(5,3,0,2);
            $rppsMedcecin = $message->getValueAtIndex(5,3,0,12);

            $patient = new Patient();
            $medecin = new Medecin();
            $patient->setNom($nom);
            $patient->setPrenom($prenom);
            $patient->setDateNaissance($dateDeNaissance);
            $patient->setGenre($genre);
            $patient->setRue($rue);
            $patient->setCodePostal($codePostal);
            $patient->setVille($ville);
            $medecin->setNom($nomMedecin);
            $medecin->setPrenom($prenomMedecin);
            $medecin->setRpps($rppsMedcecin);
            $patient->setMedecin($medecin);

            $em->persist($medecin);
            $em->persist($patient);



        }
        $em->flush();
    }

}
