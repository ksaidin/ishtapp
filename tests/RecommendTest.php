<?php
namespace IshTapp\Recommendation\Tests;

use IshTapp\Recommendation\Recommend;
use IshTapp\Recommendation\Tests\DataArrayTrait;
use PHPUnit\Framework\TestCase;

class RecommendTest extends TestCase
{
      use DataArrayTrait;
    
      public function  testRankingExpectedResult()
      {
          $client = new Recommend();
          $Aibek = $client->ranking($this->table,'Aibek');
          $maria = $client->ranking($this->table,'Maria'); 
          $Kuba = $client->ranking($this->table,'Kuba');
          $Bek = $client->ranking($this->table,'Bek');
          $Uson = $client->ranking($this->table,'Uson');
          $Rustom = $client->ranking($this->table,'Rustom');
          $Bermet = $client->ranking($this->table,'Bermet');
          $Lunara = $client->ranking($this->table,'Lunara'); 

          $this->assertEquals($Aibek, ['C'=>5]); 
          $this->assertEquals($maria, ['F'=>2]);
          $this->assertEquals($Kuba, ['F'=>4,'G'=>2]);
          $this->assertEquals($Bek, ['F'=>2,'G'=>1,'B'=>1]);
          $this->assertEquals($Uson, ['A'=>2,'C'=>2,'F'=>2, 'G'=>1]);
          $this->assertEquals($Rustom, ['G'=>2,'F'=>2]);
          $this->assertEquals($Bermet, ['A'=>2,'G'=>2,'C'=>1]);
          $this->assertEquals($Lunara, ['A'=>5,'G'=>2]);
      }

      public function  testEuclideanExpectedResult()
      {
            $client = new Recommend();
            $Aibek = $client->euclidean($this->table,'Aibek');
            $maria = $client->euclidean($this->table,'Maria'); 
            $Kuba = $client->euclidean($this->table,'Kuba');
            $Bek = $client->euclidean($this->table,'Bek');
            $Uson = $client->euclidean($this->table,'Uson');
            $Rustom = $client->euclidean($this->table,'Rustom');
            $Bermet = $client->euclidean($this->table,'Bermet');
            $Lunara = $client->euclidean($this->table,'Lunara');

            $this->assertEquals($Aibek, ['C'=>0.86]); 
            $this->assertEquals($maria, ['F'=>1,'C'=>0.74]);
            $this->assertEquals($Kuba, ['F'=>1,'G'=>1]);
            $this->assertEquals($Bek, ['F'=>1,'G'=>1,'B'=>0.25]);
            $this->assertEquals($Uson, ['A'=>0.83,'C'=>0.8,'F'=>1, 'G'=>1]);
            $this->assertEquals($Rustom, ['G'=>1,'F'=>1]);
            $this->assertEquals($Bermet, ['A'=>0.67,'G'=>1,'C'=>0.5]);
            $this->assertEquals($Lunara, ['A'=>0.87,'G'=>1]);
      }

      public function testSlopeOneExpectedResult()
      {
            $client = new Recommend();
            $Aibek = $client->slopeOne($this->table,'Aibek');
            $this->assertEquals($Aibek,['C'=>0.57]);
      }


}
