<?php
namespace Post;

use CR\Post\PostController;

class PostControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testNewRepository()
    {
        $repo = $this->getMockBuilder('\CR\Repository')->getMock();
        $repo->expects($this->exactly(4))->method('save');

        /** @noinspection PhpParamsInspection */
        new PostController($repo);
    }

    public function testAddPost()
    {
        $repo = $this->getMockBuilder('\CR\Repository')->getMock();
        /** @noinspection PhpParamsInspection */
        $pc = new PostController($repo);
        $repo->expects($this->exactly(1))->method('save');

        $pc->add("Name", "Message");
    }

    public function testGetPosts()
    {
        $repo = $this->getMockBuilder('\CR\Repository')->getMock();
        /** @noinspection PhpParamsInspection */
        $pc = new PostController($repo);
        $repo->expects($this->exactly(1))->method('load');

        $pc->getAll();
    }
}
