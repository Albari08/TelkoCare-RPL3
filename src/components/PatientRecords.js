import React, { useState, useEffect } from 'react';
import axios from 'axios';

const PatientRecords = () => {
  const [records, setRecords] = useState([]);

  useEffect(() => {
    const fetchRecords = async () => {
      try {
        const response = await axios.get('http://localhost:8000/api/patient-records'); // Update this URL according to your API endpoint
        setRecords(response.data);
      } catch (error) {
        console.error('There was an error fetching the patient records!', error);
      }
    };

    fetchRecords();
  }, []);

  const handlePrint = () => {
    const recordsString = records.map(record => 
      `ID: ${record.id}\nName: ${record.nama}\nEmail: ${record.email}\nAddress: ${record.alamat}\n\n`
    ).join('');
    
    const element = document.createElement("a");
    const file = new Blob([recordsString], {type: 'text/plain'});
    element.href = URL.createObjectURL(file);
    element.download = "patient_records.txt";
    document.body.appendChild(element);
    element.click();
  };

  return (
    <div>
      <h2>Patient Records</h2>
      <ul>
        {records.map((record) => (
          <li key={record.id}>
            <strong>{record.nama}</strong> - {record.email}
          </li>
        ))}
      </ul>
      <button onClick={handlePrint}>Print Records</button>
    </div>
  );
};

export default PatientRecords;
