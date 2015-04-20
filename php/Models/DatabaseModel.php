<?php
namespace Models;
use Helper\Connection;
use \Exception;

class DatabaseModel{
	private $db;
	
	public function __construct()
	{
		//Connect will be here
		$this->db = Connection::connect();
	}
	
	private function AddEmployee($input, $status, $user_id){
		$firstName = $input->firstName;
		$lastName = $input->lastName;
		$sin = $input->sin;
		$dateOfBirth = $input->dateOfBirth;
		$company = $input->companyName;
		
		//
		//	Look for Companies
		//
		/*$query = $this->db->prepare('SELECT id FROM company WHERE
		companyName = ?	LIMIT 1');
		if(!$query) throw new Exception($this->db->error);
		if(!$query->bind_param("s",$company)) throw new Exception($this->db->error);
		if(!$query->execute()) throw new Exception($this->db->error);
		if(!$query->store_result()) throw new Exception($this->db->error);
	
		if($query->num_rows == 0){*/		
			$sql = "INSERT INTO Company (id, companyName)
			VALUES (" . $user_id . ",'" . $company . "')";
			
			if ($this->db->query($sql) == FALSE){
				die("Error: " . $sql . "<br>" . mysqli_error($this->db));
			}
		
		
		$company_id = $this->db->insert_id;
		
/*
		$query = $this->db->prepare('SELECT id FROM company WHERE
		companyName = ?	LIMIT 1');
		if(!$query) throw new Exception($this->db->error);
		if(!$query->bind_param("s",$company)) throw new Exception($this->db->error);
		if(!$query->execute()) throw new Exception($this->db->error);
		if(!$query->store_result()) throw new Exception($this->db->error);
		if($query->num_rows == 1){		
			if(!$query->bind_result($company_id)) throw new Exception($this->db->error);
			$query->fetch();
		}else{
			throw new Exception("Database error<br>");
		}
*/
	
		//
		//	Look for Persons
		//
		/*$query = $this->db->prepare('SELECT id FROM person WHERE
		firstName = ? AND lastName = ? AND SIN = ? AND dateOfBirth = ? 
		LIMIT 1');
		if(!$query) throw new Exception($this->db->error);
		if(!$query->bind_param("ssss",$firstName,$lastName,$sin,$dateOfBirth)) throw new Exception($this->db->error);
		if(!$query->execute()) throw new Exception($this->db->error);
		if(!$query->store_result()) throw new Exception($this->db->error);*/
		
		/* if($query->num_rows == 0){	 */	
			$sql = "INSERT INTO Person (id, firstName, lastName, SIN, dateOfBirth)
			VALUES (" . $user_id . ",'" . $firstName . "','" . $lastName . "','" . $sin . "','" . $dateOfBirth . "')";
			
			if ($this->db->query($sql) == FALSE){
				throw new Exception("Error: " . $sql . "<br>" . mysqli_error($this->db));
			}
		
		
		$person_id = $this->db->insert_id;
		
		/*$query = $this->db->prepare('SELECT id FROM person WHERE
		firstName = ? AND lastName = ? AND SIN = ? AND dateOfBirth = ? 
		LIMIT 1');
		if(!$query) throw new Exception($this->db->error);
		if(!$query->bind_param("ssss",$firstName,$lastName,$sin,$dateOfBirth)) throw new Exception($this->db->error);
		if(!$query->execute()) throw new Exception($this->db->error);
		if(!$query->store_result()) throw new Exception($this->db->error);
		if($query->num_rows == 1){		
			if(!$query->bind_result($person_id)) throw new Exception($this->db->error);
			$query->fetch();
		}else{
			throw new Exception("Database error");
		}*/
		
		//
		//	Look for Employee
		//
		/*$query = $this->db->prepare('SELECT id FROM employee WHERE
		company_id = ? AND person_id = ? LIMIT 1');
		if(!$query) throw new Exception($this->db->error);
		if(!$query->bind_param("ii",$company_id, $person_id)) throw new Exception($this->db->error);
		if(!$query->execute()) throw new Exception($this->db->error);
		if(!$query->store_result()) throw new Exception($this->db->error);*/
		
		/* if($query->num_rows == 0){	 */	
			$sql = "INSERT INTO Employee (id, company_id, person_id, workStatus, reasonForLeaving)
			VALUES (" . $user_id . "," . $company_id . "," . $person_id . ",'" . $status . "','" . "" . "')";
			
			if ($this->db->query($sql) == FALSE){
				throw new Exception("Error: " . $sql . "<br>" . mysqli_error($this->db));
			}
		
		
		$employee_id = $this->db->insert_id;
		
		/*$query = $this->db->prepare('SELECT id FROM employee WHERE
		company_id = ? AND person_id = ? LIMIT 1');
		if(!$query) throw new Exception($this->db->error);
		if(!$query->bind_param("ii",$company_id, $person_id)) throw new Exception($this->db->error);
		if(!$query->execute()) throw new Exception($this->db->error);
		if(!$query->store_result()) throw new Exception($this->db->error);
		if($query->num_rows == 1){		
			if(!$query->bind_result($employee_id)) throw new Exception($this->db->error);
			$query->fetch();
		}else{
			throw new Exception("Database error");
		}*/
		
		return $employee_id;
	}
	
	public function AddFullTime($input, $status, $user_id){
		$employee_id = $this->AddEmployee($input, $status, $user_id);
		$dateOfHire = $input->dateOfHire;
		$dateOfTermination = $input->dateOfTermination;
		$salary = $input->salary;
		
		//
		//	Look for Full Time Employee
		//
/*
		$query = $this->db->prepare('SELECT id FROM fulltimeemployee WHERE
		employee_id = ? AND dateOfHire = ? AND dateOfTermination = ? AND salary = ? LIMIT 1');
		if(!$query) throw new Exception($this->db->error);
		if(!$query->bind_param("issd",$employee_id, $dateOfHire, $dateOfTermination, $salary)) throw new Exception($this->db->error);
		if(!$query->execute()) throw new Exception($this->db->error);
		if(!$query->store_result()) throw new Exception($this->db->error);
		
*/
/* 		if($query->num_rows == 0){		 */
			$sql = "INSERT INTO FullTimeEmployee (id, employee_id, dateOfHire, dateOfTermination, salary)
			VALUES (" . $user_id . "," . $employee_id . ",'" . $dateOfHire . "','" . $dateOfTermination . "','" . $salary . "')";
			
			if ($this->db->query($sql) == FALSE){
				throw new Exception("Error: " . $sql . "<br>" . mysqli_error($this->db));
			}
/* 		} */
		
/*
		$query = $this->db->prepare('SELECT id FROM fulltimeemployee WHERE
		employee_id = ? AND dateOfHire = ? AND dateOfTermination = ? AND salary = ? LIMIT 1');
		if(!$query) throw new Exception($this->db->error);
		if(!$query->bind_param("issd",$employee_id, $dateOfHire, $dateOfTermination, $salary)) throw new Exception($this->db->error);
		if(!$query->execute()) throw new Exception($this->db->error);
		if(!$query->store_result()) throw new Exception($this->db->error);
		if($query->num_rows == 1){		
			if(!$query->bind_result($fulltimeemployee_id)) throw new Exception($this->db->error);
			$query->fetch();
		}else{
			throw new Exception("Database error");
		}

		
 		return $fulltimeemployee_id; */
	}
	
	public function AddPartTime($input, $status, $user_id){
		$employee_id = $this->AddEmployee($input, $status, $user_id);
		$dateOfHire = $input->dateOfHire;
		$dateOfTermination = $input->dateOfTermination;
		$hourlyRate = $input->hourlyRate;
		
		//
		//	Look for Part Time Employee
		//
		/*$query = $this->db->prepare('SELECT id FROM parttimeemployee WHERE
		employee_id = ? AND dateOfHire = ? AND dateOfTermination = ? AND hourlyRate = ? LIMIT 1');
		if(!$query) throw new Exception($this->db->error);
		if(!$query->bind_param("issd",$employee_id, $dateOfHire, $dateOfTermination, $hourlyRate)) throw new Exception($this->db->error);
		if(!$query->execute()) throw new Exception($this->db->error);
		if(!$query->store_result()) throw new Exception($this->db->error);*/
		
		/* if($query->num_rows == 0){	 */	
			$sql = "INSERT INTO PartTimeEmployee (id, employee_id, dateOfHire, dateOfTermination, hourlyRate)
			VALUES (" . $user_id . "," . $employee_id . ",'" . $dateOfHire . "','" . $dateOfTermination . "','" . $hourlyRate . "')";
			
			if ($this->db->query($sql) == FALSE){
				throw new Exception("Error: " . $sql . "<br>" . mysqli_error($this->db));
			}
		
		
		/*$query = $this->db->prepare('SELECT id FROM parttimeemployee WHERE
		employee_id = ? AND dateOfHire = ? AND dateOfTermination = ? AND hourlyRate = ? LIMIT 1');
		if(!$query) throw new Exception($this->db->error);
		if(!$query->bind_param("issd",$employee_id, $dateOfHire, $dateOfTermination, $hourlyRate)) throw new Exception($this->db->error);
		if(!$query->execute()) throw new Exception($this->db->error);
		if(!$query->store_result()) throw new Exception($this->db->error);
		if($query->num_rows == 1){		
			if(!$query->bind_result($parttimeemployee_id)) throw new Exception($this->db->error);
			$query->fetch();
		}else{
			throw new Exception("Database error");
		}
		
		return $parttimeemployee_id;*/
	}
	
	public function AddSeasonal($input, $status, $user_id){
		$employee_id = $this->AddEmployee($input, $status, $user_id);
		$piecePay = $input->piecePay;
		$season = $input->season;
		$seasonYear = $input->seasonYear;
		
		//
		//	Look for Seasonal Employee
		//
		/*$query = $this->db->prepare('SELECT id FROM seasonalemployee WHERE
		employee_id = ? AND piecePay = ? AND season = ? AND seasonYear = ? LIMIT 1');
		if(!$query) throw new Exception($this->db->error);
		if(!$query->bind_param("idsi",$employee_id, $piecePay, $season, $seasonYear)) throw new Exception($this->db->error);
		if(!$query->execute()) throw new Exception($this->db->error);
		if(!$query->store_result()) throw new Exception($this->db->error);*/
		
		/* if($query->num_rows == 0){	 */	
			$sql = "INSERT INTO SeasonalEmployee (id, employee_id, piecePay, season, seasonYear)
			VALUES ('" . $user_id . "','" . $employee_id . "','" . $piecePay . "','" . $season . "','" . $seasonYear . "')";
			
			if ($this->db->query($sql) == FALSE){
				throw new Exception("Error: " . $sql . "<br>" . mysqli_error($this->db));
			}
		
		
		/*$query = $this->db->prepare('SELECT id FROM seasonalemployee WHERE
		employee_id = ? AND piecePay = ? AND season = ? AND seasonYear = ? LIMIT 1');
		if(!$query) throw new Exception($this->db->error);
		if(!$query->bind_param("idsi",$employee_id, $piecePay, $season, $seasonYear)) throw new Exception($this->db->error);
		if(!$query->execute()) throw new Exception($this->db->error);
		if(!$query->store_result()) throw new Exception($this->db->error);
		if($query->num_rows == 1){		
			if(!$query->bind_result($seasonalemployee_id)) throw new Exception($this->db->error);
			$query->fetch();
		}else{
			throw new Exception("Database error");
		}
		
		return $seasonalemployee_id;*/
	}
	
	public function AddContract($input, $status, $user_id){
		$companyName = $input->contractCompanyName;
		$dateOfIncorporation = $input->dateOfIncorporation;
		$corporationName = $input->corporationName;
		$businessNumber = $input->businessNumber;
		$startDate = $input->startDate;
		$endDate = $input->endDate;
		$fixedAmount = $input->fixedAmount;
				
		//
		//	Look for Companies
		//
		/*$query = $this->db->prepare('SELECT id FROM company WHERE
		companyName = ?	LIMIT 1');
		if(!$query) throw new Exception($this->db->error);
		if(!$query->bind_param("s",$companyName)) throw new Exception($this->db->error);
		if(!$query->execute()) throw new Exception($this->db->error);
		if(!$query->store_result()) throw new Exception($this->db->error);*/
	
		/* if($query->num_rows == 0){	 */	
			$sql = "INSERT INTO Company (id, companyName)
			VALUES (" . $user_id . ",'" . $companyName . "')";
			
			if ($this->db->query($sql) == FALSE){
				throw new Exception("Error: " . $sql . "<br>" . mysqli_error($this->db));
			}
		
		
		$company_id = $this->db->insert_id;
		
		/*$query = $this->db->prepare('SELECT id FROM company WHERE
		companyName = ?	LIMIT 1');
		if(!$query) throw new Exception($this->db->error);
		if(!$query->bind_param("s",$companyName)) throw new Exception($this->db->error);
		if(!$query->execute()) throw new Exception($this->db->error);
		if(!$query->store_result()) throw new Exception($this->db->error);
		if($query->num_rows == 1){		
			if(!$query->bind_result($company_id)) throw new Exception($this->db->error);
			$query->fetch();
		}else{
			throw new Exception("Database error<br>");
		}*/
		
		//
		//	Look for Contract Employee
		//
		/*$query = $this->db->prepare('SELECT id FROM contractor WHERE
		company_id = ? AND corporationName = ? AND dateOfIncorporation = ? AND buisnessNumber = ? AND
		contractStartDate = ? AND contractStopDate = ? AND fixedContractAmount = ? LIMIT 1');
		if(!$query) throw new Exception($this->db->error);
		if(!$query->bind_param("isssssd",$company_id, $corporationName, $dateOfIncorporation, $businessNumber, $startDate, $endDate, $fixedAmount)) throw new Exception($this->db->error);
		if(!$query->execute()) throw new Exception($this->db->error);
		if(!$query->store_result()) throw new Exception($this->db->error);*/
	
		/* if($query->num_rows == 0){	 */	
			$sql = "INSERT INTO Contractor(id, company_id, corporationName, dateOfIncorporation, buisnessNumber, contractStartDate, contractStopDate, fixedContractAmount)
			VALUES ('" . $user_id . "','" . $company_id . "','" . $corporationName . "','" . $dateOfIncorporation . "','" . $businessNumber . "','"
			. $startDate . "','" . $endDate . "','" . $fixedAmount . "')";
			
			if ($this->db->query($sql) == FALSE){
				throw new Exception("Error: " . $sql . "<br>" . mysqli_error($this->db));
			}
		
		
		/*$query = $this->db->prepare('SELECT id FROM contractor WHERE
		company_id = ? AND corporationName = ? AND dateOfIncorporation = ? AND buisnessNumber = ? AND
		contractStartDate = ? AND contractStopDate = ? AND fixedContractAmount = ? LIMIT 1');
		if(!$query) throw new Exception($this->db->error);
		if(!$query->bind_param("isssssd",$company_id, $corporationName, $dateOfIncorporation, $businessNumber, $startDate, $endDate, $fixedAmount)) throw new Exception($this->db->error);
		if(!$query->execute()) throw new Exception($this->db->error);
		if(!$query->store_result()) throw new Exception($this->db->error);
		if($query->num_rows == 1){		
			if(!$query->bind_result($contractor_id)) throw new Exception($this->db->error);
			$query->fetch();
		}else{
			throw new Exception("Database error<br>");
		}
		
		return $contractor_id;*/
	}
	
	private function UpdateEmployee($input, $user_id){
		$id = $input->id;
		$firstName = $input->firstName;
		$lastName = $input->lastName;
		$dateOfBirth = $input->dateOfBirth;
		$sin = $input->sin;
		$company = $input->company;
		
		$query = $this->db->prepare('SELECT company_id,person_id FROM employee
		WHERE id = (SELECT employee_id FROM fulltimeemployee WHERE id = ?) LIMIT 1');
		if(!$query) throw new Exception($this->db->error);
		if(!$query->bind_param("i",$id)) throw new Exception($this->db->error);
		if(!$query->execute()) throw new Exception($this->db->error);
		if(!$query->store_result()) throw new Exception($this->db->error);
		if($query->num_rows == 1){		
			echo "Found a employee<br>";
			
			if(!$query->bind_result($company_id, $person_id)) throw new Exception($this->db->error);
			$query->fetch();
		}else{
			throw new Exception("Database error<br>");
		}
		
		$sql = "UPDATE Company SET
		id = " . $user_id . ", companyName = '" . $company . "'
		WHERE (id = " . $id . ")";
		
		if ($this->db->query($sql) == FALSE){
			throw new Exception("Error: " . $sql . "<br>" . mysqli_error($this->db));
		}else{
			echo "	Company updated<br>";
		}
		
		$sql = "UPDATE Person SET
		id = " . $user_id . ", firstName = '" . $firstName . "', lastName = '" . $lastName . "', SIN = '" . $sin . "'"; 
		
		if ($dateOfBirth != ""){
			$sql .= ", dateOfBirth = '" . $dateOfBirth . "'";
		}
		$sql .= " WHERE (id = " . $id . ")";
		
		if ($this->db->query($sql) == FALSE){
			throw new Exception("Error: " . $sql . "<br>" . mysqli_error($this->db));
		}else{
			echo "	Person updated<br>";
		}
	}
	
	public function UpdateFullTimeEmployee($input, $user_id){
		$this->UpdateEmployee($input, $user_id);
		$id = $input->id;
		$dateOfHire = $input->dateOfHire;
		$dateOfTermination = $input->dateOfTermination;
		$salary = $input->salary;
		
		$sql = "UPDATE FullTimeEmployee SET
		id = " . $user_id;
		
		if ($dateOfHire != ""){
			$sql .= ", dateOfHire = '" . $dateOfHire . "'";
		}
		if ($dateOfTermination != ""){
			$sql .= ", dateOfTermination = '" . $dateOfTermination . "'";
		}
		if ($salary != ""){
			$sql .= ", salary = '" . $salary . "'";
		}
		$sql .= " WHERE (id = " . $id . ")";
		
		if ($this->db->query($sql) == FALSE){
			throw new Exception("Error: " . $sql . "<br>" . mysqli_error($this->db));
		}else{
			echo "	FullTime Employee updated<br>";
		}
	}
	
	public function UpdatePartTimeEmployee($input, $user_id){
		$this->UpdateEmployee($input, $user_id);
		$id = $input->id;
		$dateOfHire = $input->dateOfHire;
		$dateOfTermination = $input->dateOfTermination;
		$hourlyRate = $input->hourlyRate;
		
		$sql = "UPDATE PartTimeEmployee SET
		id = " . $user_id;
		
		if ($dateOfHire != ""){
			$sql .= ", dateOfHire = '" . $dateOfHire . "'";
		}
		if ($dateOfTermination != ""){
			$sql .= ", dateOfTermination = '" . $dateOfTermination . "'";
		}
		if ($hourlyRate != ""){
			$sql .= ", hourlyRate = '" . $hourlyRate . "'";
		}
		$sql .= " WHERE (id = " . $id . ")";
		
		if ($this->db->query($sql) == FALSE){
			throw new Exception("Error: " . $sql . "<br>" . mysqli_error($this->db));
		}else{
			echo "	PartTime Employee updated<br>";
		}
	}
	
	public function UpdateSeasonalEmployee($input, $user_id){
		$this->UpdateEmployee($input, $user_id);
		$id = $input->id;
		$season = $input->season;
		$piecePay = $input->piecePay;
		$seasonYear = $input->seasonYear;
		
		$sql = "UPDATE SeasonalEmployee SET
		id = " . $user_id;
		$sql .= ", season = '" . $season . "'";
		
		if ($piecePay != ""){
			$sql .= ", piecePay = '" . $piecePay . "'";
		}
		if ($seasonYear != ""){
			$sql .= ", seasonYear = '" . $seasonYear . "'";
		}
		$sql .= " WHERE (id = " . $id . ")";
		
		if ($this->db->query($sql) == FALSE){
			throw new Exception("Error: " . $sql . "<br>" . mysqli_error($this->db));
		}else{
			echo "	Seasonal Employee updated<br>";
		}
	}
	
	public function GetAudit(){
		$query = $this->db->prepare('SELECT user_id, changeTime, changedTable, recordId, changedField, oldValue, newValue, extra FROM audit');
		if(!$query) throw new Exception($this->db->error);
		if(!$query->execute()) throw new Exception($this->db->error);
		if(!$query->store_result()) throw new Exception($this->db->error);

		$auditInfo = array();
		if($query->num_rows > 0){
			if($query->bind_result($user_id, $changeTime, $changedTable, $recordId, $changedField, $oldValue, $newValue, $extra)){
				$success = true;
				while($query->fetch()){
					array_push($auditInfo, array(
						 "user_id" => $user_id
						,"changeTime" => $changeTime
						,"changedTable" => $changedTable
						,"recordId" => $recordId
						,"changedField" => $changedField
						,"oldValue" => $oldValue
						,"newValue" => $newValue
						,"extra" => $extra
					));
				}								
			}
		}

		return $auditInfo;
	}

	public function SearchEmployee($options){
		$keywords = $options->keywords;
		$type = $options->type;
		
		$sql = "SELECT id, type, firstName, lastName, dateOfBirth FROM (SELECT 'FullTime' AS type, fulltimeemployee.id, firstName, lastName, dateOfBirth FROM fulltimeemployee, person WHERE
				(person.id = (SELECT employee.person_id FROM employee WHERE(employee.id = fulltimeemployee.employee_id)))
				UNION ALL
				SELECT 'PartTime' AS type, parttimeemployee.id, firstName, lastName, dateOfBirth FROM parttimeemployee, person WHERE
				(person.id = (SELECT employee.person_id FROM employee WHERE(employee.id = parttimeemployee.employee_id)))
				UNION ALL
				SELECT 'Seasonal' AS type, seasonalemployee.id, firstName, lastName, dateOfBirth FROM seasonalemployee, person WHERE
				(person.id = (SELECT employee.person_id FROM employee WHERE(employee.id = seasonalemployee.employee_id)))
				UNION ALL
				SELECT 'Contract' AS type, contractor.id, companyName AS firstName, corporationName, dateOfIncorporation FROM contractor, company WHERE
				(company.id = contractor.company_id)) AS A
				WHERE (firstName LIKE CONCAT('%','" . $keywords . "','%') OR lastName LIKE CONCAT('%','" . $keywords . "','%')) order by dateOfBirth";

		
		$query = $this->db->prepare($sql);
		if(!$query) throw new Exception($this->db->error);
		if(!$query->execute()) throw new Exception($this->db->error);
		if(!$query->store_result()) throw new Exception($this->db->error);

		$employeeInfo = array();
		if($query->num_rows > 0){
			if($query->bind_result($id, $type, $firstName, $lastName, $dateOfBirth)){
				while($query->fetch()){
					array_push($employeeInfo, array(
						 "id" => $id
						 ,"type" => $type
						,"firstName" => $firstName
						,"lastName" => $lastName
						,"dateOfBirth" => $dateOfBirth
					));
				}								
			}
		}

		return $employeeInfo;
	}
	
	public function GetFullTime($id){
		$sql = "SELECT firstName, lastName, dateOfBirth, sin, companyName, workStatus, reasonForLeaving, dateOfHire, dateOfTermination, salary FROM fulltimeemployee, employee, person, company WHERE
				(
				person.id = (SELECT employee.person_id FROM employee WHERE(employee.id = fulltimeemployee.employee_id)) AND
				company.id = (SELECT employee.company_id FROM employee WHERE(employee.id = fulltimeemployee.employee_id)) AND
				employee.id = fulltimeemployee.employee_id AND
				fulltimeemployee.id = " . $id . "
				)";
		
		$query = $this->db->prepare($sql);
		if(!$query) throw new Exception($this->db->error);
		if(!$query->execute()) throw new Exception($this->db->error);
		if(!$query->store_result()) throw new Exception($this->db->error);

		$employeeData = array();
		if($query->num_rows > 0){
			if($query->bind_result($firstName, $lastName, $dateOfBirth, $sin, $companyName, $workStatus, $reasonForLeaving, $dateOfHire, $dateOfTermination, $salary)){
				while($query->fetch()){
					$employeeData = array(
						"firstName" => $firstName
						,"lastName" => $lastName
						,"dateOfBirth" => $dateOfBirth
						,"sin" => $sin
						,"companyName" => $companyName
						,"workStatus" => $workStatus
						,"reasonForLeaving" => $reasonForLeaving
						,"dateOfHire" => $dateOfHire
						,"dateOfTermination" => $dateOfTermination
						,"salary" => $salary
					);
				}								
			}
		}

		return $employeeData;
	}
	
	public function GetPartTime($id){
		$sql = "SELECT firstName, lastName, dateOfBirth, sin, companyName, workStatus, reasonForLeaving, dateOfHire, dateOfTermination, hourlyRate FROM parttimeemployee, employee, person, company WHERE
				(
				person.id = (SELECT employee.person_id FROM employee WHERE(employee.id = parttimeemployee.employee_id)) AND
				company.id = (SELECT employee.company_id FROM employee WHERE(employee.id = parttimeemployee.employee_id)) AND
				employee.id = parttimeemployee.employee_id AND
				parttimeemployee.id = " . $id . "
				)";
		
		$query = $this->db->prepare($sql);
		if(!$query) throw new Exception($this->db->error);
		if(!$query->execute()) throw new Exception($this->db->error);
		if(!$query->store_result()) throw new Exception($this->db->error);

		$employeeData = array();
		if($query->num_rows > 0){
			if($query->bind_result($firstName, $lastName, $dateOfBirth, $sin, $companyName, $workStatus, $reasonForLeaving, $dateOfHire, $dateOfTermination, $hourlyRate)){
				while($query->fetch()){
					$employeeData = array(
						"firstName" => $firstName
						,"lastName" => $lastName
						,"dateOfBirth" => $dateOfBirth
						,"sin" => $sin
						,"companyName" => $companyName
						,"workStatus" => $workStatus
						,"reasonForLeaving" => $reasonForLeaving
						,"dateOfHire" => $dateOfHire
						,"dateOfTermination" => $dateOfTermination
						,"hourlyRate" => $hourlyRate
					);
				}								
			}
		}

		return $employeeData;
	}
	
	public function GetSeasonal($id){
		$sql = "SELECT firstName, lastName, dateOfBirth, sin, companyName, workStatus, reasonForLeaving, season, piecePay, seasonYear FROM seasonalemployee, employee, person, company WHERE
				(
				person.id = (SELECT employee.person_id FROM employee WHERE(employee.id = seasonalemployee.employee_id)) AND
				company.id = (SELECT employee.company_id FROM employee WHERE(employee.id = seasonalemployee.employee_id)) AND
				employee.id = seasonalemployee.employee_id AND
				seasonalemployee.id = " . $id . "
				)";
		
		$query = $this->db->prepare($sql);
		if(!$query) throw new Exception($this->db->error);
		if(!$query->execute()) throw new Exception($this->db->error);
		if(!$query->store_result()) throw new Exception($this->db->error);

		$employeeData = array();
		if($query->num_rows > 0){
			if($query->bind_result($firstName, $lastName, $dateOfBirth, $sin, $companyName, $workStatus, $reasonForLeaving, $season, $piecePay, $seasonYear)){
				while($query->fetch()){
					$employeeData = array(
						"firstName" => $firstName
						,"lastName" => $lastName
						,"dateOfBirth" => $dateOfBirth
						,"sin" => $sin
						,"companyName" => $companyName
						,"workStatus" => $workStatus
						,"reasonForLeaving" => $reasonForLeaving
						,"season" => $season
						,"piecePay" => $piecePay
						,"seasonYear" => $seasonYear
					);
				}								
			}
		}

		return $employeeData;
	}
	
	public function GetContract($id){
		$sql = "SELECT companyName, corporationName, dateOfIncorporation, buisnessNumber, contractStartDate, contractStopDate, fixedContractAmount FROM contractor, company WHERE
				(
				company.id = contractor.company_id AND
				contractor.id = " . $id . "
				)";
		
		$query = $this->db->prepare($sql);
		if(!$query) throw new Exception($this->db->error);
		if(!$query->execute()) throw new Exception($this->db->error);
		if(!$query->store_result()) throw new Exception($this->db->error);

		$employeeData = array();
		if($query->num_rows > 0){
			if($query->bind_result($companyName, $corporationName, $dateOfIncorporation, $buisnessNumber, $contractStartDate, $contractStopDate, $fixedContractAmount)){
				while($query->fetch()){
					$employeeData = array(
						"companyName" => $companyName
						,"corporationName" => $corporationName
						,"dateOfIncorporation" => $dateOfIncorporation
						,"buisnessNumber" => $buisnessNumber
						,"contractStartDate" => $contractStartDate
						,"contractStopDate" => $contractStopDate
						,"fixedContractAmount" => $fixedContractAmount
					);
				}								
			}
		}

		return $employeeData;
	}

	public function GetTimecard($id, $type){
		$sql = "SELECT monday, tuesday, wednesday, thursday, friday, saturday, sunday FROM timecard, " . $type . "
		WHERE 
		(
		timecard.employee_id = " . $type . ".employee_id AND
		" . $type . ".id = " . $id . "
		)
		ORDER BY date DESC LIMIT 1";
		
		$query = $this->db->prepare($sql);
		if(!$query) throw new Exception($this->db->error);
		if(!$query->execute()) throw new Exception($this->db->error);
		if(!$query->store_result()) throw new Exception($this->db->error);

		$timecardData = array();
		if($query->num_rows > 0){
			if($query->bind_result($monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday)){
				while($query->fetch()){
					array_push($timecardData, array(
						"monday" => $monday
						,"tuesday" => $tuesday
						,"wednesday" => $wednesday
						,"thursday" => $thursday
						,"friday" => $friday
						,"saturday" => $saturday
						,"sunday" => $sunday
					));
				}								
			}
		}

		return $timecardData;
	}
}