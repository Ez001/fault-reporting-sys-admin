<?php
	#   Date modified: 22/09/2023  

	include_once( 'App.php' );
	include_once( 'Encryption.php' );

	class ReportFault
	{
		//using Namespaces
		use App {
			App::__construct as private __appConst;
		}

		use Encryption;

		protected $table = '';
		const DB_TABLE = 'report_faults';

		function __construct()
	 	{
			$this->__appConst();
	 		$this->table = self::DB_TABLE;
	 	}

		function getCount( array $dt )
		{
			$sql = "SELECT COUNT( id ) AS total FROM $this->table";
			$res = $this->fetchData( $sql, $dt );

			return $res['total'] ?? [];
		}

		function getCountByStatus( array $dt )
		{
			$sql = "SELECT COUNT( id ) AS total FROM $this->table WHERE status = ?";
			$res = $this->fetchData( $sql, $dt );

			return $res['total'] ?? [];
		}

	}

?>