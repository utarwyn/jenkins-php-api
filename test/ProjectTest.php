<?php

use Utarwyn\Jenkins\Jenkins;
use Utarwyn\Jenkins\Entity\Project;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Exception\ConnectException;

class ProjectTestCase extends TestCase
{
    /**
     * @var Jenkins
     */
    protected $jenkins;

    /**
     * @var Project
     */
    public $project;

    protected function setup(): void
    {
        $this->jenkins = new Jenkins('https://builds.apache.org');
        $this->project = $this->jenkins->getProject('Chainsaw');
    }

    public function testGetProject(): void
    {
        $this->assertNotNull($this->project, 'Project does not have to be null here!');
    }

    public function testProjectMethods(): void
    {
        $this->assertNotEmpty($this->project->getDescription(), 'Project description seems to be empty!');
        $this->assertEquals($this->project->getDisplayName(), 'Apache Chainsaw');
        $this->assertEquals($this->project->getFullDisplayName(), 'Apache Chainsaw');
        $this->assertEquals($this->project->getName(), 'Chainsaw');
        $this->assertEquals($this->project->getUrl(), 'https://builds.apache.org/job/Chainsaw/');
        $this->assertFalse($this->project->isBuildable(), 'Project buildability seems to be invalid.');
        $this->assertNotNull($this->project->getColor(), 'Project color seems to be null!');
        $this->assertNotNull($this->project->getHealthReport(), 'Project health report seems to be null!');
        $this->assertNotNull($this->project->getBuilds(), 'Project cannot gets a proper builds list.');
    }
}
