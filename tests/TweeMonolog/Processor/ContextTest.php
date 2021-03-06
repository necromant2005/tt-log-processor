<?php
namespace TweeMonolog\Processor;
use PHPUnit\Framework\TestCase;

class ContextTest extends TestCase
{
    public function test()
    {
        $context = new Context(array(
            'user' => 'x@x.com',
        ));
        $response = $context->__invoke(array('message' => 'abc', 'extra' => array()));
        $this->assertEquals(array(
            'message' => 'abc',
            'extra' => array(
                'user' => 'x@x.com'
            )
        ), $response);
    }

    public function testSetterGetter()
    {
        $context = new Context();
        $context->setContext(array('email' => 'x@x.com'));
        $this->assertEquals(array('email' => 'x@x.com'), $context->getContext());
    }
}
