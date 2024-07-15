import React, { useCallback, useEffect, useRef, useState } from 'react';
import { useDropzone } from 'react-dropzone';
import { Link, useNavigate } from 'react-router-dom';
import { LuBookOpen, LuFileEdit, LuFolder, LuPlus, LuShare2, LuTrash2, LuUploadCloud } from 'react-icons/lu';
import { IoClose } from 'react-icons/io5';
import { toast } from 'react-toastify';
import Cards from '../components/fragments/Cards';
import { createCategorie, deleteCategorieById, getCategorie, updateCatgory } from '../api/routes/categorie';
import { createDocument } from '../api/routes/document';
import { ContextMenu, ContextMenuTrigger, ContextMenuContent, ContextMenuItem, ContextMenuShortcut } from '../ui/ui/context-menu';

function Home() {
  const [selectedFiles, setSelectedFiles] = useState([]);
  const [dossiers, setDossiers] = useState([]);
  const [folderData, setFolderData] = useState({ label: '' });
  const [searchValue, setSearchValue] = useState([]);
  const [user, setUser] = useState();
  
  const [docData, setDocData] = useState({
    titre: "",
    resume: "",
    auteur: "",
    file_create_date: "",
    reference: "",
    category_id: null
  });

  const uploadFileRef = useRef(null);
  const updateFolderRef = useRef(null);

  const onDrop = useCallback(acceptedFiles => {
    setSelectedFiles(acceptedFiles);
    const file = acceptedFiles[0];
    setDocData(prevData => ({
      ...prevData,
      file_create_date: file?.lastModified,
      titre: file?.name.split(".")[0]
    }));
  }, []);

  function deleteFolder(id){
    deleteCategorieById(id).then(function(res){
      if (res.status===200) {
        fetchFolders()
        toast.success("Dossier supprimer avec succès")
      }
    })
  }

  function updateFolder(e,id){
    e.preventDefault()
    updateCatgory(folderData,id).then(async function(res){
      if (res.status ===200) {
        fetchFolders()
        if (updateFolderRef.current) {
          updateFolderRef.current.close()
        }
      }
      else{
        toast.error("Une erreur est survenue")
      }
    }).catch(function(err){
      console.log(err)
      toast.error("Une erreur est survenue")
    })
  }

  const fetchFolders = async () => {
    try {
      const res = await getCategorie();
      if (res.status === 200) {
        const data = await res.json();
        setDossiers(data);
        setSearchValue(data);
      }
    } catch (error) {
      console.log(error);
    }
  };

  const getFormData = (e, callback) => {
    callback(prevData => ({
      ...prevData,
      [e.target.name]: e.target.value
    }));
  };

  function searchFolder(e) {
    e.preventDefault();
    const value = e.target.value;
    const copyDos = [...dossiers];
    if (value !== "") {
      const match = copyDos.filter(d => String(d.label).toLocaleLowerCase().includes(value.toLocaleLowerCase()));
      if (match.length > 0) {
        setSearchValue(match);
      } else {
        setSearchValue(dossiers);
      }
    } else {
      setSearchValue(dossiers);
    }
  }

  const createFolder = async (e) => {
    e.preventDefault();
    try {
      const res = await createCategorie(folderData);
      if (res.status === 201) {
        fetchFolders();
        toast.success("Votre dossier a été bien créé");
      } else {
        toast.error("Une erreur s'est produite");
      }
    } catch (error) {
      toast.error("Une erreur s'est produite");
      console.log(error);
    }
  };

  const archiveDoc = async () => {
    try {
      const res = await createDocument(docData, selectedFiles[0]);
      if (res.status === 201) {
        toast.success("Le dossier a été bien archivé");
        if (uploadFileRef.current) {
          uploadFileRef.current.close();
        }
      } else {
        toast.error("Une erreur s'est produite");
      }
    } catch (error) {
      console.log(error);
      toast.error("Une erreur s'est produite");
    }
  };

  const navigate = useNavigate();

  useEffect(() => {
    setUser(JSON.parse(sessionStorage.getItem("user")));
    fetchFolders();
  }, []);

  const { getRootProps, getInputProps, isDragActive } = useDropzone({
    onDrop,
    accept: {
      'application/pdf': ['.pdf'],
      'application/vnd.openxmlformats-officedocument.wordprocessingml.document': ['.docx'],
      'application/msword': ['.doc'],
      'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet': ['.xlsx'],
      'text/csv': ['.csv'],
      'application/vnd.ms-excel': ['.xls'],
      'application/vnd.openxmlformats-officedocument.presentationml.presentation': ['.pptx'],
      'application/vnd.ms-powerpoint': ['.ppt'],
    }
  });

  return (
    <div className='flex flex-col flex-grow py-2'>
      <div className="breadcrumbs text-sm">
        <ul>
          <li><Link to="/">Sige Archive</Link></li>
          <li>Tableau de bord</li>
        </ul>
      </div>
      <div className='flex items-end flex-grow justify-end mb-3'>
        <button onClick={() => document.getElementById('uploadFile').showModal()} className="btn btn-sm bg-primary text-white hover:bg-primary">
          <LuUploadCloud />
          Archiver un document
        </button>
      </div>
      <Cards />
      <div className=''>
        <div className='flex items-end justify-between mb-3 '>
          <div>
            <label className="input input-sm  input-bordered flex items-center gap-2">
              <input type="text" onChange={searchFolder} className="grow w-full focus:w-48 hover:w-48 duration-300" placeholder="Search" />
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" className="h-4 w-4 opacity-70">
                <path fillRule="evenodd" d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z" clipRule="evenodd" />
              </svg>
            </label>
          </div>
          <button onClick={() => document.getElementById('createFolder').showModal()} className='btn btn-sm bg-primary hover:bg-primary text-white'>
            <LuPlus />
            Nouveau dossier
          </button>
        </div>
        <div className='grid grid-cols-8 justify-start w-full'>
          {searchValue.map((dossier, k) => (
            <div key={k}>
              <ContextMenu className="" >
                <ContextMenuTrigger>
                  <Link to={'folder/' + dossier.id} className='flex hover:bg-orange-400/30 rounded-lg p-2 duration-500 items-center flex-col font-semibold'>
                    <LuFolder size={100} />
                    {dossier.label}
                  </Link>
                </ContextMenuTrigger>
                <ContextMenuContent className="w-64">
                  <ContextMenuItem inset className="cursor-pointer" onClick={() => { navigate('folder/' + dossier.id) }}>
                    Ouvrir le dossier
                    <ContextMenuShortcut><LuBookOpen /></ContextMenuShortcut>
                  </ContextMenuItem>
                  <ContextMenuItem inset className="cursor-pointer" disabled={user?.role !== "Administrator"}>
                    Partager le dossier
                    <ContextMenuShortcut><LuShare2 /></ContextMenuShortcut>
                  </ContextMenuItem>
                  <ContextMenuItem inset className="cursor-pointer" onClick={() => document.getElementById('edit_folder' + dossier.id).showModal()} disabled={user?.role !== "Administrator"}>
                    Renommer le dossier
                    <ContextMenuShortcut><LuFileEdit /></ContextMenuShortcut>
                  </ContextMenuItem>
                  <ContextMenuItem disabled={user?.role !== "Administrator"} onClick={()=>{
                    if (window.confirm("Cette action n'est pas rétroactive")) {
                      deleteFolder(dossier.id)
                    }
                  }} inset className="text-red-500 hover:text-red-500 hover:bg-red-300/50 cursor-pointer">
                    <div>
                      Supprimer le dossier
                    </div>
                    <ContextMenuShortcut><LuTrash2 /></ContextMenuShortcut>
                  </ContextMenuItem>
                </ContextMenuContent>
              </ContextMenu>

              <dialog ref={updateFolderRef} id={"edit_folder" + dossier.id} className="modal">
                <div className="modal-box">
                
                    <form method="dialog" className='flex justify-end'>
                      {/* if there is a button in form, it will close the modal */}
                      <button className="btn btn-ghost">X</button>
                    </form>
                  
                  <h1 className='mb-3'>
                    Modifier le nom du dossier ({dossier.label})
                  </h1>
                  <form onSubmit={(e)=>updateFolder(e,dossier.id)} method="post">
                      <div className="form-control mb-3">
                        <label htmlFor="name" className='mb-1'>Nom du dossier</label>
                        <input type="text" id='name' name='label' onChange={(e) => getFormData(e, setFolderData)} placeholder={dossier.label} className="input input-bordered w-full" />
                      </div>
                      <div className="modal-action">
                        <button className='btn bg-primary text-white hover:bg-primary'>Modifier</button>
                      </div>
                    </form>
                    
                </div>
              </dialog>
            </div>
          ))}
        </div>
      </div>

      <dialog id="createFolder" className="modal">
        <div className="modal-box w-3/4">
          <form method="dialog" className='flex justify-end'>
            <button className='btn btn-ghost'><IoClose /></button>
          </form>
          <div className='py-4'>
            <form onSubmit={createFolder} method="post">
              <div className="form-control mb-3">
                <label htmlFor="name" className='mb-1'>Nom du dossier</label>
                <input type="text" id='name' name='label' onChange={(e) => getFormData(e, setFolderData)} placeholder="Informatique" className="input input-bordered w-full" />
              </div>
              <div className="modal-action">
                <button className='btn bg-primary text-white hover:bg-primary'>Créer</button>
              </div>
            </form>
          </div>
        </div>
      </dialog>

      <dialog id="uploadFile" className="modal" ref={uploadFileRef}>
        <div className="modal-box w-11/12 max-w-5xl">
          <form method="dialog" className='flex justify-end'>
            <button className='btn btn-ghost'><IoClose /></button>
          </form>
          <div className='py-4'>
            <form onSubmit={archiveDoc}>
              <div {...getRootProps()} className='border-2 border-dashed rounded-md p-6 cursor-pointer'>
                <input {...getInputProps()} />
                {
                  isDragActive ?
                    <p>Déposez le fichier ici ...</p> :
                    <p>Glissez et déposez un fichier ici, ou cliquez pour sélectionner un fichier</p>
                }
              </div>
              {selectedFiles.length > 0 && (
                <div className='mt-4'>
                  <h4 className='font-semibold'>Fichier sélectionné:</h4>
                  <p>{selectedFiles[0].name}</p>
                </div>
              )}
              <div className='form-control mt-4'>
                <label htmlFor="titre" className='mb-1'>Titre du document</label>
                <input type="text" id='titre' name='titre' value={docData.titre} onChange={(e) => getFormData(e, setDocData)} className="input input-bordered w-full" />
              </div>
              <div className="modal-action">
                <button className='btn bg-primary text-white hover:bg-primary'>Archiver</button>
              </div>
            </form>
          </div>
        </div>
      </dialog>


    </div>
  );
}

export default Home;
