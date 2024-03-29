<?php
/* Copyright (c) 1998-2019 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * @author Jesús López <lopez@leifos.com>
 */
class ilViteroStatisticSoapConnector extends ilViteroSoapConnector
{
	const WSDL_NAME = 'statistic.wsdl';

	public function getSessionRecordingById($a_session_recording_id, $a_timezone = "")
	{
		try {
			$this->initClient();

			$session = new stdClass();
			$session->sessionrecordingid = $a_session_recording_id;
			$session_recording = $this->getClient()->getSessionRecordingById($session);

			return $session_recording;

		}
		catch (Exception $e)
		{
			$code = $this->parseErrorCode($e);
			$GLOBALS['ilLog']->write(__METHOD__.': Get session recording by id failed with message code: '.$code);
			$GLOBALS['ilLog']->write(__METHOD__.': Last request: '.$this->getClient()->__getLastRequest());
			throw new ilViteroConnectorException($e->getMessage(),$code);
		}
	}

	public function getUserRecordingById()
	{

	}

	public function getSessionAndUserRecordingsBySessionId()
	{

	}

	/**
	 * REQUEST required: timeslotstart, timeslotend
	 * REQUEST optional for admins: custmoerid
	 * REQUEST optional: groupid, bookingid, bookinngtimeid, userid, sessionsortorder, timezone
	 * Gets information about session recordings in a specific time slot.
	 * @param $a_time_slot_start
	 * @param $a_time_slot_end
	 * @throws ilViteroConnectorException
	 */
	public function getSessionRecordingsByTimeSlot($a_time_slot_start, $a_time_slot_end)
	{
		try {
			$this->initClient();

			$session = new stdClass();
			$session->timeslotstart = $a_time_slot_start;
			$session->timeslotend = $a_time_slot_end;
			$session_recording = $this->getClient()->getSessionRecordingsByTimeSlot($session);

			return $session_recording;
		}
		catch(Exception $e)
		{
			$code = $this->parseErrorCode($e);
			$GLOBALS['ilLog']->write(__METHOD__.': Get session recordings by timeslot failed with message code: '.$code);
			$GLOBALS['ilLog']->write(__METHOD__.': Last request: '.$this->getClient()->__getLastRequest());
			throw new ilViteroConnectorException($e->getMessage(),$code);
		}

	}

	public function getSessionAndUserRecordingsByTimeSlot()
	{

	}

	public function getCapacityRecordingByDate()
	{

	}

	public function getCapacityRecordingsByTimeSlot()
	{

	}

	protected function getWsdlName()
	{
		return self::WSDL_NAME;
	}


}
?>
