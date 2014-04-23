<?php

class FacilityTest extends TestCase
{
    /**
     * Username is required
     */
    public function testFacilityNmaeIsRequired()
    {
      // Create a new User
      $facility = new Facility;
      $facility->name = "";
      $facility->address1 = "";
      $facility->address2 = "";
      $facility->city = "";
      $facility->county = "";
      $facility->post_code = "";
      $facility->latitude = "";
      $facility->longitude = "";
      $facility->capacity = "";
      $facility->description = "";
     
      // User should not save
      $this->assertFalse($facility->save());
     
      // Save the errors
      $errors = $facility->errors()->all();
     
      // There should be 1 error
      $this->assertCount(1, $errors);
     
      // The username error should be set
      $this->assertEquals($errors[0], "The name field is required.");
    }
}