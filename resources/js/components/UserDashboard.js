import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

const UserDashboard = () => {
    const [user, setUser] = useState(null);

    useEffect(() => {
        axios.get('/api/user-data')
            .then(response => {
                setUser(response.data);
            })
            .catch(error => {
                console.error('There was an error fetching the user data!', error);
            });
    }, []);

    if (!user) {
        return <div>Loading...</div>;
    }

    return (
        <div className="dashboard-container">
            <div className="sidebar">
                <ul>
                    <li>Dashboard</li>
                    <li>Antrian</li>
                    <li>Jadwal Dokter</li>
                    <li>Resep Dokter</li>
                    <li className="active">Rekam Medis</li>
                    <li>Booking</li>
                    <li>Halaman Akun</li>
                    <li>Profile</li>
                </ul>
            </div>
            <div className="content">
                <h1>Rekam Medis</h1>
                <div className="profile">
                    <img src="/path/to/avatar.png" alt="Avatar" className="avatar" />
                    <div className="profile-details">
                        <p>Nama: {user.nama}</p>
                        <p>NIM/NIK: {user.nim}</p>
                        <p>Jenis Kelamin: {user.jenis_kelamin}</p>
                        <p>TTL: {user.tempat_lahir}, {user.tanggal_lahir}</p>
                        <p>No. HP: {user.nohp}</p>
                        <p>Alamat: {user.alamat}</p>
                    </div>
                    <div className="important-notes">
                        <h3>Catatan Penting:</h3>
                        <p>{user.important_notes}</p>
                    </div>
                </div>
                <div className="medical-records">
                    <h2>Data Rekam Medis <button className="print-button">Cetak</button></h2>
                    {user.medical_records.map((record, index) => (
                        <div key={index} className="record">
                            <h3>{record.date}</h3>
                            <div className="record-details">
                                <p>Dokter: {record.doctor}</p>
                                <p>Diagnosa: {record.diagnosis}</p>
                                <p>Tindakan: {record.intervention}</p>
                                <p>Obat: {record.medication}</p>
                            </div>
                        </div>
                    ))}
                </div>
            </div>
        </div>
    );
};

export default UserDashboard;

if (document.getElementById('user-dashboard')) {
    ReactDOM.render(<UserDashboard />, document.getElementById('user-dashboard'));
}
