import React from 'react';
import './style.css';

const MedicalRecordFormComponent = () => {
    return (
        <div className="form-container">
            <form>
                <label htmlFor="nama">Nama:</label>
                <input type="text" id="nama" name="nama" />

                <label htmlFor="nim">NIM/NIK:</label>
                <input type="text" id="nim" name="nim" />

                <label htmlFor="jenis_kelamin">Jenis Kelamin:</label>
                <select id="jenis_kelamin" name="jenis_kelamin">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>

                <label htmlFor="ttl">Tanggal Lahir:</label>
                <input type="date" id="ttl" name="ttl" />

                <label htmlFor="nohp">No. HP:</label>
                <input type="text" id="nohp" name="nohp" />

                <label htmlFor="alamat">Alamat:</label>
                <input type="text" id="alamat" name="alamat" />

                <button type="submit">Submit</button>
            </form>
        </div>
    );
};

export default MedicalRecordFormComponent;