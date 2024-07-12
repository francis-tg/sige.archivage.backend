drop database if exists sige;

create database if not exists sige;
# -----------------------------------------------------------------------------
#       table : presentation
# -----------------------------------------------------------------------------

create table if not exists presentation
 (
   code_pres integer(2) not null  ,
   code_bureau varchar(128) not null  ,
   photo_chef varchar(128) not null  ,
   message text not null  ,
   cursus_ing text null  ,
   grille_ing text null  ,
   science_ing text null  ,
   grille_science text null  
   , primary key (code_pres) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : session_examen
# -----------------------------------------------------------------------------

create table if not exists session_examen
 (
   code_session char(32) not null  ,
   code_annee smallint(1) not null  ,
   label_session varchar(128) not null  ,
   date_debut_session date not null  ,
   date_fin_session date null  ,
   statut_session smallint(1) not null  
   , primary key (code_session) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : ue
# -----------------------------------------------------------------------------

create table if not exists ue
 (
   code_ue char(32) not null  ,
   code_sem smallint(1) not null  ,
   intitule_ue varchar(128) not null  ,
   desc_ue text null  
   , primary key (code_ue) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : inscription
# -----------------------------------------------------------------------------

create table if not exists inscription
 (
   code_ins char(32) not null  ,
   code_user char(32) not null  ,
   code_annee smallint(1) not null  ,
   date_ins datetime not null  ,
   statut_ins smallint(1) not null  
   , primary key (code_ins) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : examen
# -----------------------------------------------------------------------------

create table if not exists examen
 (
   code_examen char(32) not null  ,
   code_session char(32) not null  ,
   type_evaluation char(32) not null  
   , primary key (code_examen) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : permission
# -----------------------------------------------------------------------------

create table if not exists permission
 (
   code_permis smallint(1) not null  ,
   label_permis varchar(128) not null  
   , primary key (code_permis) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : tranche
# -----------------------------------------------------------------------------

create table if not exists tranche
 (
   code_tranche integer(2) not null  ,
   lable_tranche varchar(128) not null  ,
   montant_tranche bigint(4) not null  
   , primary key (code_tranche) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : bureau
# -----------------------------------------------------------------------------

create table if not exists bureau
 (
   code_bureau varchar(128) not null  ,
   label_div varchar(128) not null  ,
   desc_div text null  ,
   type_bureau varchar(128) not null  
   , primary key (code_bureau) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : semestre
# -----------------------------------------------------------------------------

create table if not exists semestre
 (
   code_sem smallint(1) not null  ,
   label_sem varchar(128) null  
   , primary key (code_sem) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : personnel
# -----------------------------------------------------------------------------

create table if not exists personnel
 (
   code_pers char(32) not null  ,
   nom_pers varchar(128) not null  ,
   prenom_pers varchar(128) null  ,
   sexe_pers char(32) not null  ,
   date_naissance_pers date not null  ,
   lieu_naissance_pers varchar(128) not null  ,
   statut_mat_pers char(32) not null  ,
   lieu_residence_pers varchar(128) null  ,
   first_phone_pers char(32) not null  ,
   second_phone_pers varchar(128) null  ,
   cni_pers varchar(128) not null  ,
   email_pers varchar(128) not null  ,
   login_pers varchar(128) not null  ,
   pwd_pers varchar(128) not null  ,
   photo_pers varchar(128) null  ,
   lang_pers varchar(128) null  ,
   bibliographie_pers text null  ,
   nb_enfant_pers smallint(1) null  
   , primary key (code_pers) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : modepaiment
# -----------------------------------------------------------------------------

create table if not exists modepaiment
 (
   code_mode smallint(1) not null  ,
   label_mode varchar(128) not null  ,
   desc_mode text null  
   , primary key (code_mode) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : anneescolaire
# -----------------------------------------------------------------------------

create table if not exists anneescolaire
 (
   code_annee smallint(1) not null  ,
   debut_annee date not null  ,
   fin_annee date not null  
   , primary key (code_annee) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : info_extra
# -----------------------------------------------------------------------------

create table if not exists info_extra
 (
   code_info_extra smallint(1) not null  ,
   nom_pere_user varchar(128) null  ,
   nom_mere_user varchar(128) null  ,
   telephone_tuteur_user char(32) null  ,
   email_tuteur_user varchar(128) null  ,
   telephone_mere varchar(128) null  
   , primary key (code_info_extra) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : ressource
# -----------------------------------------------------------------------------

create table if not exists ressource
 (
   code_res smallint(1) not null  ,
   label_res char(32) not null  ,
   type_res char(32) not null  ,
   desc_res text null  
   , primary key (code_res) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : diplome
# -----------------------------------------------------------------------------

create table if not exists diplome
 (
   code_dip smallint(1) not null  ,
   label_dip varchar(128) not null  ,
   specialtite_dip varchar(128) not null  
   , primary key (code_dip) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : salle
# -----------------------------------------------------------------------------

create table if not exists salle
 (
   code_salle char(32) not null  ,
   nb_place_salle smallint(1) not null  ,
   etat_salle bool not null  ,
   desc_salle text null  
   , primary key (code_salle) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : documents
# -----------------------------------------------------------------------------

create table if not exists documents
 (
   code_doc char(32) not null  ,
   code_session char(32) not null  ,
   code_bureau varchar(128) not null  ,
   label_doc varchar(128) not null  ,
   description_doc text null  ,
   type_doc varchar(128) not null  ,
   nom_fichier varchar(128) not null  
   , primary key (code_doc) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : niveau
# -----------------------------------------------------------------------------

create table if not exists niveau
 (
   code_niveau char(32) not null  ,
   label_niveau varchar(128) null  
   , primary key (code_niveau) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : role
# -----------------------------------------------------------------------------

create table if not exists role
 (
   code_role smallint(1) not null  ,
   label_role varchar(128) not null  ,
   acreditation_role smallint(1) null  
   , primary key (code_role) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : users
# -----------------------------------------------------------------------------

create table if not exists users
 (
   code_user char(32) not null  ,
   code_info_extra smallint(1) null  ,
   nom_user varchar(128) not null  ,
   prenom_user varchar(128) null  ,
   sexe_user varchar(128) not null  ,
   date_naissance_user date not null  ,
   lieu_naissance_user varchar(128) not null  ,
   statut_mat_user varchar(128) not null  ,
   lieu_resi_user varchar(128) null  ,
   first_phone_user varchar(20) not null  ,
   second_phone_user varchar(128) null  ,
   numero_cni_user varchar(128) not null  ,
   email_user varchar(128) not null  ,
   date_deliv_cni_user date not null  ,
   login_user varchar(128) not null  ,
   pwd_user varchar(128) not null  ,
   photo_user varchar(128) null  ,
   handicap_user varchar(128) null  ,
   langue_user varchar(128) null  ,
   nbre_enfant_user smallint(1) not null  
      default 0,
   nationalite_user varchar(128) null  ,
   region_origine_user varchar(128) null  ,
   depart_origine_user varchar(128) null  ,
   arrond_origine_user varchar(128) null  ,
   bibiographie_user text null  
   , primary key (code_user) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : filiere
# -----------------------------------------------------------------------------

create table if not exists filiere
 (
   code_filiere char(32) not null  ,
   code_bureau varchar(128) not null  ,
   label_filiere varchar(128) not null  ,
   desc_filiere text null  
   , primary key (code_filiere) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : ec
# -----------------------------------------------------------------------------

create table if not exists ec
 (
   code_ec char(32) not null  ,
   code_ue char(32) not null  ,
   intitule_ec varchar(128) not null  ,
   credit_ec smallint(1) not null  ,
   vh_ec smallint(1) not null  ,
   cm_ec smallint(1) not null  ,
   td_ec smallint(1) not null  ,
   tp_ec smallint(1) not null  ,
   tpe_ec smallint(1) not null  
   , primary key (code_ec) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : role_permission
# -----------------------------------------------------------------------------

create table if not exists role_permission
 (
   code_permis smallint(1) not null  ,
   code_role smallint(1) not null  
   , primary key (code_permis,code_role) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : filiere_niveau
# -----------------------------------------------------------------------------

create table if not exists filiere_niveau
 (
   code_filiere char(32) not null  ,
   code_niveau char(32) not null  ,
   code_ins char(32) not null  
   , primary key (code_filiere,code_niveau,code_ins) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : users_role
# -----------------------------------------------------------------------------

create table if not exists users_role
 (
   code_user char(32) not null  ,
   code_role smallint(1) not null  ,
   date_debut_role date not null  ,
   date_fin_role date null  ,
   etat_role integer(2) not null  
   , primary key (code_user,code_role) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : evaluation
# -----------------------------------------------------------------------------

create table if not exists evaluation
 (
   code_ec char(32) not null  ,
   code_examen char(32) not null  ,
   code_user char(32) not null  ,
   date_evaluation date not null  ,
   code_ano char(32) null  ,
   note_eval decimal(10,2) not null  ,
   date_evalu date not null  
   , primary key (code_ec,code_examen,code_user) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : users_diplome
# -----------------------------------------------------------------------------

create table if not exists users_diplome
 (
   code_user char(32) not null  ,
   code_dip smallint(1) not null  ,
   annee_dip date not null  ,
   institution_dip varchar(128) not null  ,
   mention_dip varchar(128) not null  ,
   pays_dip varchar(128) not null  
   , primary key (code_user,code_dip) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : ec_ressource
# -----------------------------------------------------------------------------

create table if not exists ec_ressource
 (
   code_ec char(32) not null  ,
   code_res smallint(1) not null  ,
   code_pers char(32) not null  
   , primary key (code_ec,code_res,code_pers) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : periode
# -----------------------------------------------------------------------------

create table if not exists periode
 (
   code_salle char(32) not null  ,
   code_ec char(32) not null  ,
   code_periode smallint(1) null  ,
   debut_periode date not null  ,
   jour_periode smallint(1) not null  ,
   fin_periode date not null  ,
   duree_periode smallint(1) not null  
   , primary key (code_salle,code_ec) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : etudiant_ec
# -----------------------------------------------------------------------------

create table if not exists etudiant_ec
 (
   code_user char(32) not null  ,
   code_ec char(32) not null  
   , primary key (code_user,code_ec) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : quitus
# -----------------------------------------------------------------------------

create table if not exists quitus
 (
   code_ins char(32) not null  ,
   code_tranche integer(2) not null  ,
   code_mode smallint(1) not null  ,
   numero_quitus varchar(128) not null  ,
   date_paiement date not null  ,
   statut_quitus smallint(1) not null  
   , primary key (code_ins,code_tranche,code_mode) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : pers_role
# -----------------------------------------------------------------------------

create table if not exists pers_role
 (
   code_role smallint(1) not null  ,
   code_bureau varchar(128) not null  ,
   code_pers char(32) not null  ,
   date_debut_role date not null  ,
   date_fin_role date null  ,
   satut_role smallint(1) not null  
   , primary key (code_role,code_bureau,code_pers) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : semestre_niveau
# -----------------------------------------------------------------------------

create table if not exists semestre_niveau
 (
   code_niveau char(32) not null  ,
   code_sem smallint(1) not null  
   , primary key (code_niveau,code_sem) 
 ) 
 comment = "";


# -----------------------------------------------------------------------------
#       creation des references de table
# -----------------------------------------------------------------------------


alter table presentation 
  add foreign key fk_presentation_bureau (code_bureau)
      references bureau (code_bureau) ;


alter table session_examen 
  add foreign key fk_session_examen_anneescolaire (code_annee)
      references anneescolaire (code_annee) ;


alter table ue 
  add foreign key fk_ue_semestre (code_sem)
      references semestre (code_sem) ;


alter table inscription 
  add foreign key fk_inscription_users (code_user)
      references users (code_user) ;


alter table inscription 
  add foreign key fk_inscription_anneescolaire (code_annee)
      references anneescolaire (code_annee) ;


alter table examen 
  add foreign key fk_examen_session_examen (code_session)
      references session_examen (code_session) ;


alter table documents 
  add foreign key fk_documents_session_examen (code_session)
      references session_examen (code_session) ;


alter table documents 
  add foreign key fk_documents_bureau (code_bureau)
      references bureau (code_bureau) ;


alter table users 
  add foreign key fk_users_info_extra (code_info_extra)
      references info_extra (code_info_extra) ;


alter table filiere 
  add foreign key fk_filiere_bureau (code_bureau)
      references bureau (code_bureau) ;


alter table ec 
  add foreign key fk_ec_ue (code_ue)
      references ue (code_ue) ;


alter table role_permission 
  add foreign key fk_role_permission_permission (code_permis)
      references permission (code_permis) ;


alter table role_permission 
  add foreign key fk_role_permission_role (code_role)
      references role (code_role) ;


alter table filiere_niveau 
  add foreign key fk_filiere_niveau_filiere (code_filiere)
      references filiere (code_filiere) ;


alter table filiere_niveau 
  add foreign key fk_filiere_niveau_niveau (code_niveau)
      references niveau (code_niveau) ;


alter table filiere_niveau 
  add foreign key fk_filiere_niveau_inscription (code_ins)
      references inscription (code_ins) ;


alter table users_role 
  add foreign key fk_users_role_users (code_user)
      references users (code_user) ;


alter table users_role 
  add foreign key fk_users_role_role (code_role)
      references role (code_role) ;


alter table evaluation 
  add foreign key fk_evaluation_ec (code_ec)
      references ec (code_ec) ;


alter table evaluation 
  add foreign key fk_evaluation_examen (code_examen)
      references examen (code_examen) ;


alter table evaluation 
  add foreign key fk_evaluation_users (code_user)
      references users (code_user) ;


alter table users_diplome 
  add foreign key fk_users_diplome_users (code_user)
      references users (code_user) ;


alter table users_diplome 
  add foreign key fk_users_diplome_diplome (code_dip)
      references diplome (code_dip) ;


alter table ec_ressource 
  add foreign key fk_ec_ressource_ec (code_ec)
      references ec (code_ec) ;


alter table ec_ressource 
  add foreign key fk_ec_ressource_ressource (code_res)
      references ressource (code_res) ;


alter table ec_ressource 
  add foreign key fk_ec_ressource_personnel (code_pers)
      references personnel (code_pers) ;


alter table periode 
  add foreign key fk_periode_salle (code_salle)
      references salle (code_salle) ;


alter table periode 
  add foreign key fk_periode_ec (code_ec)
      references ec (code_ec) ;


alter table etudiant_ec 
  add foreign key fk_etudiant_ec_users (code_user)
      references users (code_user) ;


alter table etudiant_ec 
  add foreign key fk_etudiant_ec_ec (code_ec)
      references ec (code_ec) ;


alter table quitus 
  add foreign key fk_quitus_inscription (code_ins)
      references inscription (code_ins) ;


alter table quitus 
  add foreign key fk_quitus_tranche (code_tranche)
      references tranche (code_tranche) ;


alter table quitus 
  add foreign key fk_quitus_modepaiment (code_mode)
      references modepaiment (code_mode) ;


alter table pers_role 
  add foreign key fk_pers_role_role (code_role)
      references role (code_role) ;


alter table pers_role 
  add foreign key fk_pers_role_bureau (code_bureau)
      references bureau (code_bureau) ;


alter table pers_role 
  add foreign key fk_pers_role_personnel (code_pers)
      references personnel (code_pers) ;


alter table semestre_niveau 
  add foreign key fk_semestre_niveau_niveau (code_niveau)
      references niveau (code_niveau) ;


alter table semestre_niveau 
  add foreign key fk_semestre_niveau_semestre (code_sem)
      references semestre (code_sem) ;

