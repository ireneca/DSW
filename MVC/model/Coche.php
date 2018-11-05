<?php
class Coche
{
	private $pdo;

    public $auto_id;
    public $make;
    public $model;
    public $year;
    public $mileage;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM autos");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($auto_id)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM autos WHERE auto_id = ?");
			$stm->execute(array($auto_id));

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($auto_id)
	{
		try
		{
			$stm = $this->pdo->prepare("DELETE FROM autos WHERE auto_id = ?");

			$stm->execute(array($auto_id));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE autos SET
						make            = ?,
						model           = ?,
            year            = ?,
						mileage         = ?,
				    WHERE auto_id   = ?";

			$this->pdo->prepare($sql)->execute(
				    array(
                  $data->make,
									$data->model,
                  $data->year,
                  $data->mileage,
                  $data->auto_id
								)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Coche $data)
	{
		try
		{
		$sql = "INSERT INTO autos (make,model,year,mileage)VALUES (?, ?, ?, ?)";

		$this->pdo->prepare($sql)->execute(
				array(
							$data->make,
							$data->model,
							$data->year,
							$data->mileage
						)
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}
?>
