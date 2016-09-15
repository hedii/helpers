<?php

namespace Hedii\Helpers\Tests;

class HelpersTest extends TestCase
{
    private $string = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.';

    private $validUrls = [
        'ftp://ftp.is.co.za.example.org/rfc/rfc1808.txt',
        'gopher://spinaltap.micro.umn.example.edu/00/Weather/California/Los%20Angeles',
        'http://www.ietf.org/rfc/rfc2396.txt',
        'http://www.math.uio.no.example.net/faq/compression-faq/part1.html',
        'https://www.youtube.com/watch?v=6FOUqQt3Kg0',
        'ldap://[2001:db8::7]/c=GB?objectClass?one',
        'mailto:John.Doe@example.com',
        'mailto:mduerst@ifi.unizh.example.gov',
        'news:comp.infosystems.www.servers.unix',
        'news:comp.infosystems.www.servers.unix',
        'telnet://192.0.2.16:80/',
        'telnet://melvyl.ucop.example.edu/'
    ];

    private $invalidUrls = [
        'example.com',
        'http:/example.com/',
        'tel:+1-816-555-1212',
        'urn:oasis:names:specification:docbook:dtd:xml:4.1.2'
    ];

    public function setUp()
    {
        parent::setUp();
    }

    public function test_it_should_have_string_without_helper()
    {
        $result = string_without($this->string, ', consectetur');

        $this->assertEquals('Lorem ipsum dolor sit amet adipiscing elit.', $result);
        $this->assertInternalType('string', $result);
    }

    public function test_it_should_have_string_before_helper()
    {
        $result = string_before($this->string, ', consectetur');

        $this->assertEquals('Lorem ipsum dolor sit amet', $result);
        $this->assertInternalType('string', $result);
    }

    public function test_it_should_have_string_after_helper()
    {
        $result = string_after($this->string, ', consectetur');

        $this->assertEquals(' adipiscing elit.', $result);
        $this->assertInternalType('string', $result);
    }

    public function test_it_should_have_string_between_helper()
    {
        $result = string_between($this->string, ', consectetur', 'elit');

        $this->assertEquals(' adipiscing ', $result);
        $this->assertInternalType('string', $result);
    }

    public function test_it_should_have_string_starts_with_helper()
    {
        $this->assertTrue(string_starts_with($this->string, 'Lorem'));
        $this->assertTrue(string_starts_with($this->string, ['Lorem']));
        $this->assertTrue(string_starts_with($this->string, ['some string', 'Lorem']));
        $this->assertFalse(string_starts_with($this->string, 'some string'));
        $this->assertFalse(string_starts_with($this->string, ['some string']));
        $this->assertInternalType('boolean', string_starts_with($this->string, 'Lorem'));
    }

    public function test_it_should_have_string_ends_with_helper()
    {
        $this->assertTrue(string_ends_with($this->string, 'elit.'));
        $this->assertTrue(string_ends_with($this->string, ['elit.']));
        $this->assertTrue(string_ends_with($this->string, ['some string', 'elit.']));
        $this->assertFalse(string_ends_with($this->string, 'some string'));
        $this->assertFalse(string_ends_with($this->string, ['some string']));
        $this->assertInternalType('boolean', string_ends_with($this->string, 'elit.'));
    }

    public function test_it_should_have_string_length_helper()
    {
        $this->assertEquals(56, string_length($this->string));
        $this->assertInternalType('integer', string_length($this->string));
    }

    public function test_it_should_have_string_is_helper()
    {
        $this->assertTrue(string_is('Lorem*', $this->string));
        $this->assertTrue(string_is('Lorem*elit.', $this->string));
        $this->assertFalse(string_is('foo*', $this->string));
        $this->assertInternalType('boolean', string_is('Lorem*', $this->string));
    }

    public function test_it_should_have_string_contains_helper()
    {
        $this->assertTrue(string_contains($this->string, 'amet,'));
        $this->assertTrue(string_contains($this->string, ['amet,']));
        $this->assertTrue(string_contains($this->string, ['some string', 'amet,']));
        $this->assertFalse(string_contains($this->string, 'some string'));
        $this->assertFalse(string_contains($this->string, ['some string']));
        $this->assertInternalType('boolean', string_contains($this->string, 'amet,'));
    }

    public function test_it_should_have_string_finish_helper()
    {
        $this->assertEquals($this->string, string_finish($this->string, '.'));
        $this->assertEquals($this->string . '..', string_finish($this->string, '..'));
        $this->assertInternalType('string', string_finish($this->string, '.'));
    }

    public function test_it_should_have_string_random_helper()
    {
        $this->assertInternalType('string', string_random());
        $this->assertEquals(32, strlen(string_random()));
        $this->assertEquals(16, strlen(string_random(16)));
    }

    public function test_it_should_have_is_url_helper()
    {
        foreach ($this->validUrls as $url) {
            $this->assertTrue(is_url($url));
            $this->assertInternalType('boolean', is_url($url));
        }

        foreach ($this->invalidUrls as $url) {
            $this->assertFalse(is_url($url));
            $this->assertInternalType('boolean', is_url($url));
        }
    }

    public function test_it_should_have_class_basename_helper()
    {
        $this->assertEquals('HelpersTest', class_basename($this));
    }

    public function test_it_should_have_is_windows_os_helper()
    {
        $this->assertInternalType('boolean', is_windows_os());

        // uncomment to test...
        //$this->assertFalse(is_windows_os());
    }
}