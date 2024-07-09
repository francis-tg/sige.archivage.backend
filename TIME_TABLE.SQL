drop database if exists time_table;

create database if not exists time_table;
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
#       table : annee_academique
# -----------------------------------------------------------------------------

create table if not exists annee_academique
 (
   code_annee integer(2) not null  ,
   debut_annee date not null  ,
   fin_annee date not null  
   , primary key (code_annee) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : programmation
# -----------------------------------------------------------------------------

create table if not exists programmation
 (
   code_prog integer(2) not null  ,
   code_ho integer(2) not null  ,
   code_salle char(32) not null  ,
   code_ec char(32) not null  ,
   date_prog date not null  
   , primary key (code_prog) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : emploi_temps
# -----------------------------------------------------------------------------

create table if not exists emploi_temps
 (
   code_emploi char(32) not null  ,
   code_prog integer(2) not null  ,
   code_sem integer(2) not null  ,
   code_classe char(32) not null  
   , primary key (code_emploi) 
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
#       table : classe
# -----------------------------------------------------------------------------

create table if not exists classe
 (
   code_classe char(32) not null  ,
   code_niveau char(32) not null  ,
   code_filiere char(32) not null  ,
   effectifs_classe integer(2) null  
   , primary key (code_classe) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : semaine
# -----------------------------------------------------------------------------

create table if not exists semaine
 (
   code_sem integer(2) not null  ,
   code_annee integer(2) not null  ,
   debut_sem date not null  ,
   fin_sem date not null  
   , primary key (code_sem) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       table : horaire
# -----------------------------------------------------------------------------

create table if not exists horaire
 (
   code_ho integer(2) not null  ,
   heure_debut time not null  ,
   heure_fin time not null  ,
   label_horaire char(32) not null  
   , primary key (code_ho) 
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
#       table : salle
# -----------------------------------------------------------------------------

create table if not exists salle
 (
   code_salle char(32) not null  ,
   nb_place_salle smallint(1) not null  ,
   etat_salle bool not null  ,
   desc_salle text null  ,
   statut_salle smallint(1) not null  
   , primary key (code_salle) 
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
   tpe_ec smallint(1) not null  ,
   vh_restant integer(2) not null  
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
   code_niveau char(32) not null  
   , primary key (code_filiere,code_niveau) 
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


alter table ue 
  add foreign key fk_ue_semestre (code_sem)
      references semestre (code_sem) ;


alter table programmation 
  add foreign key fk_programmation_horaire (code_ho)
      references horaire (code_ho) ;


alter table programmation 
  add foreign key fk_programmation_salle (code_salle)
      references salle (code_salle) ;


alter table programmation 
  add foreign key fk_programmation_ec (code_ec)
      references ec (code_ec) ;


alter table emploi_temps 
  add foreign key fk_emploi_temps_programmation (code_prog)
      references programmation (code_prog) ;


alter table emploi_temps 
  add foreign key fk_emploi_temps_semaine (code_sem)
      references semaine (code_sem) ;


alter table emploi_temps 
  add foreign key fk_emploi_temps_classe (code_classe)
      references classe (code_classe) ;


alter table classe 
  add foreign key fk_classe_niveau (code_niveau)
      references niveau (code_niveau) ;


alter table classe 
  add foreign key fk_classe_filiere (code_filiere)
      references filiere (code_filiere) ;


alter table semaine 
  add foreign key fk_semaine_annee_academique (code_annee)
      references annee_academique (code_annee) ;


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


alter table ec_ressource 
  add foreign key fk_ec_ressource_ec (code_ec)
      references ec (code_ec) ;


alter table ec_ressource 
  add foreign key fk_ec_ressource_ressource (code_res)
      references ressource (code_res) ;


alter table ec_ressource 
  add foreign key fk_ec_ressource_personnel (code_pers)
      references personnel (code_pers) ;


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

