import React, { useEffect, useState } from 'react';
import { getRoles } from '../api/routes/role';
import { getBureaux } from '../api/routes/bureau';
import { createPersonnel } from '../api/routes/personnel';

function PersonnelModal({ isOpen, onClose, onSaveSuccess }) {
    const [formData, setFormData] = useState({
        nom_pers: '',
        prenom_pers: '',
        email_pers: '',
        role_id: '',
        bureau_id: '', // Assuming bureau_id is also needed for Personnel creation
    });
    const [Roles, setRoles] = useState([])
    const [Bureaux, setBureaux] = useState([])

    const handleChange = (e) => {
        const { name, value } = e.target;
        setFormData({
            ...formData,
            [name]: value,
        });
    };

    function fetchRole() {
        getRoles().then(async function (res) {
            if (res.status === 200) {
                const data = await res.json()
                setRoles(data)
            }
        }).catch(function (err) {
            console.log(err)
        })
    }
    function fetchBureau() {
        getBureaux().then(async function (res) {
            if (res.status === 200) {
                const data = await res.json()
                setBureaux(data)
            }
        }).catch(function (err) {
            console.log(err)
        })
    }

    useEffect(() => {
        fetchRole()
        fetchBureau()
        return () => {
            fetchRole()
            fetchBureau()
        }
    },)


    const handleSubmit = async (e) => {
        e.preventDefault();
        try {
            const response = await createPersonnel(formData)
            if (response.status ===201) {
                const data = await response.json()
                onSaveSuccess(data); // Assuming response.data contains the saved personnel data
                onClose(); // Close the modal on successful save
            }
        } catch (error) {
            console.error('Erreur lors de la sauvegarde du personnel:', error);
            // Handle error state or feedback to user
        }
    };

    if (!isOpen) return null;

    return (
        <div className="modal modal-open">
            <div className="modal-box">
                <h2 className="font-bold text-lg">Ajouter Personnel</h2>
                <form onSubmit={handleSubmit}>
                    <div className="form-control">
                        <label className="label">
                            <span className="label-text">Nom</span>
                        </label>
                        <input
                            type="text"
                            name="nom_pers"
                            value={formData.nom_pers}
                            onChange={handleChange}
                            className="input input-bordered"
                            placeholder="Entrer le nom"
                            required
                        />
                    </div>
                    <div className="form-control">
                        <label className="label">
                            <span className="label-text">Prénom</span>
                        </label>
                        <input
                            type="text"
                            name="prenom_pers"
                            value={formData.prenom_pers}
                            onChange={handleChange}
                            className="input input-bordered"
                            placeholder="Entrer le prénom"
                            required
                        />
                    </div>
                    <div className="form-control">
                        <label className="label">
                            <span className="label-text">Email</span>
                        </label>
                        <input
                            type="email"
                            name="email_pers"
                            value={formData.email_pers}
                            onChange={handleChange}
                            className="input input-bordered"
                            placeholder="Entrer l'email"
                            required
                        />
                    </div>
                    <div className="form-control">
                        <label className="label">
                            <span className="label-text">Rôle</span>
                        </label>
                        <select
                            name="role_id"
                            value={formData.role_id}
                            onChange={handleChange}
                            className="select select-bordered"
                            required
                        >
                            <option value="">Sélectionner un rôle</option>
                            {Roles.map((role)=>(
                                <option value={role?.id}>{role?.label}</option>
                            ))}
                        </select>
                    </div>
                    <div className="form-control">
                        <label className="label">
                            <span className="label-text">Bureau ID</span>
                        </label>
                        <select
                            name="bureau_id"
                            value={formData.bureau_id}
                            onChange={handleChange}
                            className="select select-bordered"
                            required
                        >
                            <option value="">Sélectionner un bureau</option>
                            {Bureaux.map((bureau)=>(
                                <option value={bureau?.id}>{bureau?.nom}</option>
                            ))}
                        </select>
                    </div>
                    <div className="modal-action">
                        <button type="button" className="btn" onClick={onClose}>
                            Annuler
                        </button>
                        <button type="submit" className="btn btn-primary">
                            Sauvegarder
                        </button>
                    </div>
                </form>
            </div>
        </div>
    );
}

export default PersonnelModal;
