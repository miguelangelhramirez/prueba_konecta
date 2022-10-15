<?php

	Class Crud extends Conexion {

		private $conexion;
		private $strquery;
		private $arrValues;

		public function __construct() {

			$this->conexion = new Conexion();
			$this->conexion = $this->conexion->conexion();

		}


		public function insert(string $query, array $arrValues) {

			$this->strquery = $query;
			$this->arrValues = $arrValues;

			$insert = $this->conexion->prepare($this->strquery);
			
			try {
				$resInsert = $insert->execute($this->arrValues);				
				echo "true";

			} catch (PDOException $e) {
				echo "Error: ". $e->getMessage();
			}
		}

		public function select(int $id, string $query) {

			$this->strquery = $query;
			$result = $this->conexion->prepare($this->strquery);
			$result->bindParam(':id', $id, PDO::PARAM_INT);
			$result->execute();
			$data = $result->fetch(PDO::FETCH_ASSOC);
			return $data;
		}


		public function select_all(string $query) {

			$this->strquery = $query;
			$result = $this->conexion->prepare($this->strquery);
			$result->execute();
			$data = $result->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}


		public function update(string $query, array $arrValues) {

			$this->strquery = $query;
			$this->arrValues = $arrValues;

			$update = $this->conexion->prepare($this->strquery);
			

			try {

				$resUpdate = $update->execute($this->arrValues);				
				echo "true";

			} catch (PDOException $e) {

				echo "Error: ". $e->getMessage();

			}

			
		}


		public function delete(int $id, string $query) {

			$this->strquery = $query;
			$result = $this->conexion->prepare($this->strquery);
			$result->bindParam(':id', $id, PDO::PARAM_INT);
						
			try {

				$result->execute();				
				echo "true";

			} catch (PDOException $e) {

				echo "Error: ". $e->getMessage();

			}
		}


	}


?>