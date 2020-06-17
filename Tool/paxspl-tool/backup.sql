/*
File name: E:\Docs\Documents\Unipampa\tcc\PAxSPL\Tool\db_backup\paxspl-dump.sql
Creation date: 06/13/2020
Created by MySQL to PostgreSQL 5.1 [Demo]
--------------------------------------------------
More conversion tools at http://www.convert-in.com
*/
set client_encoding to 'UTF8';

/*
Table structure for table 'public.activities'
*/

DROP TABLE IF EXISTS "public"."activities" CASCADE;
CREATE UNLOGGED TABLE "public"."activities" ("id" BIGSERIAL NOT NULL, "created_at" TIMESTAMP, "updated_at" TIMESTAMP, "name" VARCHAR(255)  NOT NULL, "phase" VARCHAR(255)  NOT NULL, "order" INTEGER NOT NULL, "description" TEXT NOT NULL, "status" VARCHAR(255)  DEFAULT 'created' NOT NULL, "assemble_process_id" BIGINT NOT NULL, "technique_id" BIGINT NOT NULL, "phase_id" INTEGER DEFAULT 1 NOT NULL, "experience_id" BIGINT) ;
ALTER SEQUENCE "public"."activities_id_seq" RESTART WITH 23 INCREMENT BY 1;
DROP INDEX IF EXISTS "PRIMARY";
ALTER TABLE "public"."activities" ADD CONSTRAINT "PRIMARY" PRIMARY KEY ("id");
DROP INDEX IF EXISTS "activities_assemble_process_id_foreign";
CREATE INDEX "activities_assemble_process_id_foreign00000" ON "public"."activities" ("assemble_process_id");
DROP INDEX IF EXISTS "activities_technique_id_foreign";
CREATE INDEX "activities_technique_id_foreign00000" ON "public"."activities" ("technique_id");
DROP INDEX IF EXISTS "activities_experience_id_foreign";
CREATE INDEX "activities_experience_id_foreign00000" ON "public"."activities" ("experience_id");

/*
Dumping data for table 'public.activities'
*/

INSERT INTO "public"."activities"("id", "created_at", "updated_at", "name", "phase", "order", "description", "status", "assemble_process_id", "technique_id", "phase_id", "experience_id") VALUES (1, '2020-04-15 19:31:53', '2020-06-06 18:40:22', 'Apply FCA into requirements', 'extract', 1, 'FCA must be applied into the requirements to retrieve the features identified among the software products.', 'done', 1, 4, 1, 8);
INSERT INTO "public"."activities"("id", "created_at", "updated_at", "name", "phase", "order", "description", "status", "assemble_process_id", "technique_id", "phase_id", "experience_id") VALUES (2, '2020-04-15 19:40:56', '2020-06-06 18:38:16', 'Apply LSI into source code', 'extract', 1, 'd', 'done', 1, 5, 1, 5);
INSERT INTO "public"."activities"("id", "created_at", "updated_at", "name", "phase", "order", "description", "status", "assemble_process_id", "technique_id", "phase_id", "experience_id") VALUES (5, '2020-04-17 20:42:15', '2020-06-06 18:38:11', 'Test', 'categorize', 1, 'fa', 'done', 1, 4, 2, NULL);
INSERT INTO "public"."activities"("id", "created_at", "updated_at", "name", "phase", "order", "description", "status", "assemble_process_id", "technique_id", "phase_id", "experience_id") VALUES (15, '2020-04-19 00:09:46', '2020-05-12 19:58:46', 'Define Metrics for Scoping', 'SupportS', 1, 'Define the metrics that will be used for Scoping', 'done', 7, 18, 0, NULL);
INSERT INTO "public"."activities"("id", "created_at", "updated_at", "name", "phase", "order", "description", "status", "assemble_process_id", "technique_id", "phase_id", "experience_id") VALUES (16, '2020-04-19 00:10:57', '2020-05-12 19:40:58', 'Analyze the market', 'domain', 1, 'Find potential for the SPL', 'doing', 7, 10, 1, NULL);
INSERT INTO "public"."activities"("id", "created_at", "updated_at", "name", "phase", "order", "description", "status", "assemble_process_id", "technique_id", "phase_id", "experience_id") VALUES (17, '2020-05-24 07:54:52', '2020-06-09 04:32:34', 'Divide features with LSI', 'extract', 1, 'Use LSI to divide features and classes into common and variable partitions;', 'done', 8, 5, 1, NULL);
INSERT INTO "public"."activities"("id", "created_at", "updated_at", "name", "phase", "order", "description", "status", "assemble_process_id", "technique_id", "phase_id", "experience_id") VALUES (18, '2020-05-24 07:55:25', '2020-05-27 11:24:02', 'Fragment variable partitions with FCA', 'extract', 2, 'Fragment variable partitions into minimal disjoint sets using FCA', 'done', 8, 4, 1, NULL);
INSERT INTO "public"."activities"("id", "created_at", "updated_at", "name", "phase", "order", "description", "status", "assemble_process_id", "technique_id", "phase_id", "experience_id") VALUES (20, '2020-05-24 08:02:43', '2020-05-27 11:25:21', 'Derive code-topics from common class partitions;', 'group', 1, 'Code-topics are derived based on their common class partitions;', 'done', 8, 1, 3, NULL);
INSERT INTO "public"."activities"("id", "created_at", "updated_at", "name", "phase", "order", "description", "status", "assemble_process_id", "technique_id", "phase_id", "experience_id") VALUES (21, '2020-05-24 08:11:36', '2020-05-27 11:29:11', 'Perform traceability links between features and code-topics;', 'fm', 1, 'Analyzed and perform the traceability links between features and their code-topics;', 'done', 8, 5, 4, NULL);
INSERT INTO "public"."activities"("id", "created_at", "updated_at", "name", "phase", "order", "description", "status", "assemble_process_id", "technique_id", "phase_id", "experience_id") VALUES (22, '2020-05-24 08:14:12', '2020-05-27 11:30:45', 'Determine feature implementation', 'fm', 2, 'determine which classes implement each feature.', 'done', 8, 9, 4, NULL);

/*
Table structure for table 'public.activities_artifacts'
*/

DROP TABLE IF EXISTS "public"."activities_artifacts" CASCADE;
CREATE UNLOGGED TABLE "public"."activities_artifacts" ("id" BIGSERIAL NOT NULL, "created_at" TIMESTAMP, "updated_at" TIMESTAMP, "io" VARCHAR(255)  NOT NULL, "activity_id" BIGINT NOT NULL, "artifact_id" BIGINT NOT NULL, "status" VARCHAR(50)  DEFAULT 'created' NOT NULL, "obs" TEXT) ;
ALTER SEQUENCE "public"."activities_artifacts_id_seq" RESTART WITH 32 INCREMENT BY 1;
DROP INDEX IF EXISTS "PRIMARY00000";
ALTER TABLE "public"."activities_artifacts" ADD CONSTRAINT "PRIMARY00000" PRIMARY KEY ("id");
DROP INDEX IF EXISTS "activities_artifacts_activity_id_foreign";
CREATE INDEX "activities_artifacts_activity_id_foreign00000" ON "public"."activities_artifacts" ("activity_id");
DROP INDEX IF EXISTS "activities_artifacts_artifact_id_foreign";
CREATE INDEX "activities_artifacts_artifact_id_foreign00000" ON "public"."activities_artifacts" ("artifact_id");

/*
Dumping data for table 'public.activities_artifacts'
*/

INSERT INTO "public"."activities_artifacts"("id", "created_at", "updated_at", "io", "activity_id", "artifact_id", "status", "obs") VALUES (1, '2020-05-09 19:15:25', '2020-05-09 19:15:25', 'i', 2, 12, 'created', '');
INSERT INTO "public"."activities_artifacts"("id", "created_at", "updated_at", "io", "activity_id", "artifact_id", "status", "obs") VALUES (5, '2020-05-09 19:40:46', '2020-05-09 19:40:46', 'i', 2, 12, 'created', '');
INSERT INTO "public"."activities_artifacts"("id", "created_at", "updated_at", "io", "activity_id", "artifact_id", "status", "obs") VALUES (6, '2020-05-09 19:44:56', '2020-05-09 19:44:56', 'i', 2, 14, 'created', '');
INSERT INTO "public"."activities_artifacts"("id", "created_at", "updated_at", "io", "activity_id", "artifact_id", "status", "obs") VALUES (7, '2020-05-09 19:48:17', '2020-05-09 19:48:17', 'i', 1, 14, 'created', '');
INSERT INTO "public"."activities_artifacts"("id", "created_at", "updated_at", "io", "activity_id", "artifact_id", "status", "obs") VALUES (8, '2020-05-09 19:48:33', '2020-05-14 00:51:44', 'o', 1, 15, 'checked', 'erros found');
INSERT INTO "public"."activities_artifacts"("id", "created_at", "updated_at", "io", "activity_id", "artifact_id", "status", "obs") VALUES (9, '2020-05-09 20:12:54', '2020-05-09 20:12:54', 'i', 2, 5, 'created', '');
INSERT INTO "public"."activities_artifacts"("id", "created_at", "updated_at", "io", "activity_id", "artifact_id", "status", "obs") VALUES (11, '2020-05-11 19:08:31', '2020-05-11 19:08:31', 'i', 16, 7, 'created', '');
INSERT INTO "public"."activities_artifacts"("id", "created_at", "updated_at", "io", "activity_id", "artifact_id", "status", "obs") VALUES (12, '2020-05-11 19:08:56', '2020-05-14 01:08:45', 'o', 16, 16, 'checked', 'found this');
INSERT INTO "public"."activities_artifacts"("id", "created_at", "updated_at", "io", "activity_id", "artifact_id", "status", "obs") VALUES (13, '2020-05-11 19:09:08', '2020-05-11 19:09:08', 'i', 16, 16, 'created', '');
INSERT INTO "public"."activities_artifacts"("id", "created_at", "updated_at", "io", "activity_id", "artifact_id", "status", "obs") VALUES (14, '2020-05-12 21:33:49', '2020-05-14 00:24:02', 'o', 2, 17, 'problem', '123');
INSERT INTO "public"."activities_artifacts"("id", "created_at", "updated_at", "io", "activity_id", "artifact_id", "status", "obs") VALUES (16, '2020-05-14 00:34:18', '2020-05-14 00:34:42', 'o', 1, 19, 'problem', '2');
INSERT INTO "public"."activities_artifacts"("id", "created_at", "updated_at", "io", "activity_id", "artifact_id", "status", "obs") VALUES (17, '2020-05-27 11:21:43', '2020-05-27 11:21:43', 'i', 17, 20, 'created', '');
INSERT INTO "public"."activities_artifacts"("id", "created_at", "updated_at", "io", "activity_id", "artifact_id", "status", "obs") VALUES (18, '2020-05-27 11:21:47', '2020-05-27 11:21:47', 'i', 17, 21, 'created', '');
INSERT INTO "public"."activities_artifacts"("id", "created_at", "updated_at", "io", "activity_id", "artifact_id", "status", "obs") VALUES (19, '2020-05-27 11:23:00', '2020-06-10 22:51:17', 'o', 17, 22, 'checked', '');
INSERT INTO "public"."activities_artifacts"("id", "created_at", "updated_at", "io", "activity_id", "artifact_id", "status", "obs") VALUES (20, '2020-05-27 11:23:11', '2020-05-27 11:23:11', 'i', 18, 20, 'created', '');
INSERT INTO "public"."activities_artifacts"("id", "created_at", "updated_at", "io", "activity_id", "artifact_id", "status", "obs") VALUES (21, '2020-05-27 11:23:15', '2020-05-27 11:23:15', 'i', 18, 21, 'created', '');
INSERT INTO "public"."activities_artifacts"("id", "created_at", "updated_at", "io", "activity_id", "artifact_id", "status", "obs") VALUES (22, '2020-05-27 11:23:54', '2020-05-27 11:23:54', 'o', 18, 23, 'created', '');
INSERT INTO "public"."activities_artifacts"("id", "created_at", "updated_at", "io", "activity_id", "artifact_id", "status", "obs") VALUES (23, '2020-05-27 11:24:00', '2020-05-27 11:24:00', 'i', 18, 22, 'created', '');
INSERT INTO "public"."activities_artifacts"("id", "created_at", "updated_at", "io", "activity_id", "artifact_id", "status", "obs") VALUES (24, '2020-05-27 11:24:14', '2020-05-27 11:24:14', 'i', 20, 22, 'created', '');
INSERT INTO "public"."activities_artifacts"("id", "created_at", "updated_at", "io", "activity_id", "artifact_id", "status", "obs") VALUES (25, '2020-05-27 11:24:19', '2020-05-27 11:24:19', 'i', 20, 23, 'created', '');
INSERT INTO "public"."activities_artifacts"("id", "created_at", "updated_at", "io", "activity_id", "artifact_id", "status", "obs") VALUES (26, '2020-05-27 11:25:20', '2020-05-27 11:25:20', 'o', 20, 24, 'created', '');
INSERT INTO "public"."activities_artifacts"("id", "created_at", "updated_at", "io", "activity_id", "artifact_id", "status", "obs") VALUES (27, '2020-05-27 11:28:21', '2020-05-27 11:28:21', 'i', 21, 24, 'created', '');
INSERT INTO "public"."activities_artifacts"("id", "created_at", "updated_at", "io", "activity_id", "artifact_id", "status", "obs") VALUES (28, '2020-05-27 11:29:10', '2020-05-27 11:29:10', 'o', 21, 25, 'created', '');
INSERT INTO "public"."activities_artifacts"("id", "created_at", "updated_at", "io", "activity_id", "artifact_id", "status", "obs") VALUES (29, '2020-05-27 11:29:29', '2020-05-27 11:29:29', 'i', 22, 24, 'created', '');
INSERT INTO "public"."activities_artifacts"("id", "created_at", "updated_at", "io", "activity_id", "artifact_id", "status", "obs") VALUES (30, '2020-05-27 11:29:35', '2020-05-27 11:29:35', 'i', 22, 25, 'created', '');
INSERT INTO "public"."activities_artifacts"("id", "created_at", "updated_at", "io", "activity_id", "artifact_id", "status", "obs") VALUES (31, '2020-05-27 11:30:44', '2020-05-27 11:30:44', 'o', 22, 26, 'created', '');

/*
Table structure for table 'public.artifacts'
*/

DROP TABLE IF EXISTS "public"."artifacts" CASCADE;
CREATE UNLOGGED TABLE "public"."artifacts" ("id" BIGSERIAL NOT NULL, "name" VARCHAR(255)  NOT NULL, "description" TEXT NOT NULL, "external_link" TEXT, "created_at" TIMESTAMP, "updated_at" TIMESTAMP, "last_update_date" TIMESTAMP, "project_id" BIGINT NOT NULL, "last_update_user" BIGINT NOT NULL, "owner_id" BIGINT NOT NULL, "type" VARCHAR(255)  NOT NULL, "extension" VARCHAR(25)  NOT NULL) ;
ALTER SEQUENCE "public"."artifacts_id_seq" RESTART WITH 27 INCREMENT BY 1;
DROP INDEX IF EXISTS "PRIMARY00001";
ALTER TABLE "public"."artifacts" ADD CONSTRAINT "PRIMARY00001" PRIMARY KEY ("id");
DROP INDEX IF EXISTS "artifacts_project_id_foreign";
CREATE INDEX "artifacts_project_id_foreign00000" ON "public"."artifacts" ("project_id");
DROP INDEX IF EXISTS "artifacts_owner_id_foreign";
CREATE INDEX "artifacts_owner_id_foreign00000" ON "public"."artifacts" ("owner_id");
DROP INDEX IF EXISTS "artifacts_last_update_user_foreign";
CREATE INDEX "artifacts_last_update_user_foreign00000" ON "public"."artifacts" ("last_update_user");

/*
Dumping data for table 'public.artifacts'
*/

INSERT INTO "public"."artifacts"("id", "name", "description", "external_link", "created_at", "updated_at", "last_update_date", "project_id", "last_update_user", "owner_id", "type", "extension") VALUES (5, 'Use case specification 2', 'fa', 'https://github.com/HestiaProject/PAxSPL/wiki/Artifacts-Description#artifacts-type-specification', '2020-01-28 19:04:13', '2020-02-29 06:07:38', '2020-02-29 06:07:38', 1, 1, 1, 'Requirements', 'doc');
INSERT INTO "public"."artifacts"("id", "name", "description", "external_link", "created_at", "updated_at", "last_update_date", "project_id", "last_update_user", "owner_id", "type", "extension") VALUES (7, 'Domain Glossary', 'Domain Glossary', '53', '2020-02-01 18:34:33', '2020-02-19 23:24:01', '2020-02-19 23:24:01', 1, 1, 1, 'Domain', '.pdf');
INSERT INTO "public"."artifacts"("id", "name", "description", "external_link", "created_at", "updated_at", "last_update_date", "project_id", "last_update_user", "owner_id", "type", "extension") VALUES (10, 'a', 'a', 'a', '2020-02-29 21:48:55', '2020-02-29 21:48:55', '2020-02-29 21:48:55', 2, 1, 1, 'Domain', 'a');
INSERT INTO "public"."artifacts"("id", "name", "description", "external_link", "created_at", "updated_at", "last_update_date", "project_id", "last_update_user", "owner_id", "type", "extension") VALUES (12, 'Source Code', 'fa', 'fa', '2020-03-02 00:37:38', '2020-04-17 20:44:00', '2020-04-17 20:44:00', 1, 1, 1, 'Development', 'fa');
INSERT INTO "public"."artifacts"("id", "name", "description", "external_link", "created_at", "updated_at", "last_update_date", "project_id", "last_update_user", "owner_id", "type", "extension") VALUES (14, 'Novo Artifact 323', 'testando', 'https://github.com/HestiaProject/PAxSPL/wiki/Artifacts-Description', '2020-05-09 19:21:29', '2020-05-09 20:06:19', '2020-05-09 20:06:19', 1, 1, 1, 'Domain', '.doc');
INSERT INTO "public"."artifacts"("id", "name", "description", "external_link", "created_at", "updated_at", "last_update_date", "project_id", "last_update_user", "owner_id", "type", "extension") VALUES (15, 'novo 36', 'Sempre', 'https://github.com/HestiaProject/PAxSPL/wiki/Artifacts-Description', '2020-05-09 19:48:32', '2020-05-14 00:51:05', '2020-05-14 00:51:05', 1, 1, 1, 'Design', '.pdf');
INSERT INTO "public"."artifacts"("id", "name", "description", "external_link", "created_at", "updated_at", "last_update_date", "project_id", "last_update_user", "owner_id", "type", "extension") VALUES (16, 'New Artifact 320', 'testa', 'https://laravel.com/docs/7.x/controllers', '2020-05-11 19:08:56', '2020-05-14 01:08:24', '2020-05-14 01:08:24', 1, 1, 1, 'Design', 'test');
INSERT INTO "public"."artifacts"("id", "name", "description", "external_link", "created_at", "updated_at", "last_update_date", "project_id", "last_update_user", "owner_id", "type", "extension") VALUES (17, 'newwww', 'fa', 'af', '2020-05-12 21:33:49', '2020-05-12 21:33:49', '2020-05-12 21:33:49', 1, 1, 1, 'Domain', 'fa');
INSERT INTO "public"."artifacts"("id", "name", "description", "external_link", "created_at", "updated_at", "last_update_date", "project_id", "last_update_user", "owner_id", "type", "extension") VALUES (18, 'aluradao', 'fixed', 'f', '2020-05-12 21:34:09', '2020-05-14 00:48:22', '2020-05-14 00:48:22', 1, 1, 1, 'Domain', 'f');
INSERT INTO "public"."artifacts"("id", "name", "description", "external_link", "created_at", "updated_at", "last_update_date", "project_id", "last_update_user", "owner_id", "type", "extension") VALUES (19, '33', '3', '3', '2020-05-14 00:34:18', '2020-05-14 00:34:18', '2020-05-14 00:34:18', 1, 1, 1, 'Domain', '3');
INSERT INTO "public"."artifacts"("id", "name", "description", "external_link", "created_at", "updated_at", "last_update_date", "project_id", "last_update_user", "owner_id", "type", "extension") VALUES (20, 'Objected-oriented Source Code', 'Souce code of the argoUML', 'https://github.com/argouml-tigris-org/argouml', '2020-05-24 07:50:27', '2020-05-24 07:50:27', '2020-05-24 07:50:27', 6, 1, 1, 'Development', '.java');
INSERT INTO "public"."artifacts"("id", "name", "description", "external_link", "created_at", "updated_at", "last_update_date", "project_id", "last_update_user", "owner_id", "type", "extension") VALUES (21, 'Feature Description', 'Description of features of the argoUML system.', 'https://github.com/argouml-tigris-org/argouml', '2020-05-24 07:52:03', '2020-05-24 07:52:03', '2020-05-24 07:52:03', 6, 1, 1, 'Domain', '.doc');
INSERT INTO "public"."artifacts"("id", "name", "description", "external_link", "created_at", "updated_at", "last_update_date", "project_id", "last_update_user", "owner_id", "type", "extension") VALUES (22, 'Common and variable partitions', 'Classes that implement common and optional features', 'https://github.com/argouml-tigris-org/argouml', '2020-05-27 11:23:00', '2020-05-27 11:31:59', '2020-05-27 11:31:59', 6, 1, 1, 'Development', '.lsi');
INSERT INTO "public"."artifacts"("id", "name", "description", "external_link", "created_at", "updated_at", "last_update_date", "project_id", "last_update_user", "owner_id", "type", "extension") VALUES (23, 'Minimal disjoint sets', 'Variable partitions are fragmented into minimal disjoint sets using FCA.', 'https://github.com/argouml-tigris-org/argouml', '2020-05-27 11:23:54', '2020-05-27 11:32:11', '2020-05-27 11:32:11', 6, 1, 1, 'Development', '.fca');
INSERT INTO "public"."artifacts"("id", "name", "description", "external_link", "created_at", "updated_at", "last_update_date", "project_id", "last_update_user", "owner_id", "type", "extension") VALUES (24, 'Code-topics', 'Code-topics derived from common class partition and each minimal disjoint set of classes', 'https://github.com/argouml-tigris-org/argouml', '2020-05-27 11:25:20', '2020-05-27 11:25:20', '2020-05-27 11:25:20', 6, 1, 1, 'Development', '.topic');
INSERT INTO "public"."artifacts"("id", "name", "description", "external_link", "created_at", "updated_at", "last_update_date", "project_id", "last_update_user", "owner_id", "type", "extension") VALUES (25, 'Traceability links', 'Traceability links between features and their possible corresponding code-topics', 'https://github.com/argouml-tigris-org/argouml', '2020-05-27 11:29:10', '2020-05-27 11:29:10', '2020-05-27 11:29:10', 6, 1, 1, 'Development', '.lsi');
INSERT INTO "public"."artifacts"("id", "name", "description", "external_link", "created_at", "updated_at", "last_update_date", "project_id", "last_update_user", "owner_id", "type", "extension") VALUES (26, 'Decomposed code-topics', 'Decomposed code-topic to its classes determining which classes that implement each feature.', 'https://github.com/argouml-tigris-org/argouml', '2020-05-27 11:30:44', '2020-05-27 11:30:44', '2020-05-27 11:30:44', 6, 1, 1, 'Development', '.topic');

/*
Table structure for table 'public.assemble_processes'
*/

DROP TABLE IF EXISTS "public"."assemble_processes" CASCADE;
CREATE UNLOGGED TABLE "public"."assemble_processes" ("id" BIGSERIAL NOT NULL, "created_at" TIMESTAMP, "updated_at" TIMESTAMP, "name" VARCHAR(255)  NOT NULL, "status" VARCHAR(255)  DEFAULT 'created' NOT NULL, "project_id" BIGINT NOT NULL, "type" VARCHAR(20)  NOT NULL, "diagram" TEXT DEFAULT '''''<?xml version="1.0" encoding="UTF-8"?> <bpmn:definitions xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:bpmn="http://www.omg.org/spec/BPMN/20100524/MODEL" xmlns:bpmndi="http://www.omg.org/spec/BPMN/20100524/DI" xmlns:dc="http://www.omg.org/spec/DD/20100524/DC" xmlns:di="http://www.omg.org/spec/DD/20100524/DI" id="Definitions_014zzan" targetNamespace="http://bpmn.io/schema/bpmn" exporter="bpmn-js (https://demo.bpmn.io)" exporterVersion="6.5.1">   <bpmn:collaboration id="Collaboration_0msf5rh">     <bpmn:participant id="Participant_1dpdn6p" name="Generic Process" processRef="Process_0nqp456" />   </bpmn:collaboration>   <bpmn:process id="Process_0nqp456" isExecutable="false">     <bpmn:startEvent id="Event_00ivwir">       <bpmn:outgoing>Flow_0ufuik6</bpmn:outgoing>     </bpmn:startEvent>     <bpmn:task id="Activity_0b44uyr" name="Extract">       <bpmn:incoming>Flow_0ufuik6</bpmn:incoming>       <bpmn:incoming>Flow_1x1en9f</bpmn:incoming>       <bpmn:outgoing>Flow_0jlqzbv</bpmn:outgoing>     </bpmn:task>     <bpmn:sequenceFlow id="Flow_0ufuik6" sourceRef="Event_00ivwir" targetRef="Activity_0b44uyr" />     <bpmn:exclusiveGateway id="Gateway_0a2g599" name="Check">       <bpmn:incoming>Flow_0jlqzbv</bpmn:incoming>       <bpmn:outgoing>Flow_1x1en9f</bpmn:outgoing>       <bpmn:outgoing>Flow_1yadp7s</bpmn:outgoing>     </bpmn:exclusiveGateway>     <bpmn:sequenceFlow id="Flow_0jlqzbv" sourceRef="Activity_0b44uyr" targetRef="Gateway_0a2g599" />     <bpmn:sequenceFlow id="Flow_1x1en9f" name="Not Ok" sourceRef="Gateway_0a2g599" targetRef="Activity_0b44uyr" />     <bpmn:exclusiveGateway id="Gateway_190p5r1" name="Check">       <bpmn:incoming>Flow_14xplzk</bpmn:incoming>       <bpmn:outgoing>Flow_1r5ghn4</bpmn:outgoing>       <bpmn:outgoing>Flow_0bacyby</bpmn:outgoing>     </bpmn:exclusiveGateway>     <bpmn:sequenceFlow id="Flow_1r5ghn4" name="Not Ok" sourceRef="Gateway_190p5r1" targetRef="Activity_12pbov6" />     <bpmn:task id="Activity_12pbov6" name="Categorize">       <bpmn:incoming>Flow_1yadp7s</bpmn:incoming>       <bpmn:incoming>Flow_1r5ghn4</bpmn:incoming>       <bpmn:outgoing>Flow_14xplzk</bpmn:outgoing>     </bpmn:task>     <bpmn:sequenceFlow id="Flow_14xplzk" sourceRef="Activity_12pbov6" targetRef="Gateway_190p5r1" />     <bpmn:sequenceFlow id="Flow_1yadp7s" name="Ok" sourceRef="Gateway_0a2g599" targetRef="Activity_12pbov6" />     <bpmn:task id="Activity_18wcxg1" name="Group">       <bpmn:incoming>Flow_0bacyby</bpmn:incoming>       <bpmn:incoming>Flow_1qztjd5</bpmn:incoming>       <bpmn:outgoing>Flow_1v39yum</bpmn:outgoing>     </bpmn:task>     <bpmn:sequenceFlow id="Flow_0bacyby" name="Ok" sourceRef="Gateway_190p5r1" targetRef="Activity_18wcxg1" />     <bpmn:exclusiveGateway id="Gateway_1ssqwu7" name="Check">       <bpmn:incoming>Flow_1v39yum</bpmn:incoming>       <bpmn:outgoing>Flow_1qztjd5</bpmn:outgoing>       <bpmn:outgoing>Flow_056edb0</bpmn:outgoing>     </bpmn:exclusiveGateway>     <bpmn:sequenceFlow id="Flow_1v39yum" sourceRef="Activity_18wcxg1" targetRef="Gateway_1ssqwu7" />     <bpmn:sequenceFlow id="Flow_1qztjd5" name="Not Ok" sourceRef="Gateway_1ssqwu7" targetRef="Activity_18wcxg1" />     <bpmn:task id="Activity_1avb052" name="Create Feature Model">       <bpmn:incoming>Flow_056edb0</bpmn:incoming>       <bpmn:incoming>Flow_0lst3zv</bpmn:incoming>       <bpmn:outgoing>Flow_0mz8g4i</bpmn:outgoing>     </bpmn:task>     <bpmn:sequenceFlow id="Flow_056edb0" name="Ok" sourceRef="Gateway_1ssqwu7" targetRef="Activity_1avb052" />     <bpmn:exclusiveGateway id="Gateway_0balowq" name="Check">       <bpmn:incoming>Flow_0mz8g4i</bpmn:incoming>       <bpmn:outgoing>Flow_0qplcfp</bpmn:outgoing>       <bpmn:outgoing>Flow_0lst3zv</bpmn:outgoing>     </bpmn:exclusiveGateway>     <bpmn:sequenceFlow id="Flow_0mz8g4i" sourceRef="Activity_1avb052" targetRef="Gateway_0balowq" />     <bpmn:endEvent id="Event_0wmrvj1">       <bpmn:incoming>Flow_0qplcfp</bpmn:incoming>     </bpmn:endEvent>     <bpmn:sequenceFlow id="Flow_0qplcfp" name="Ok" sourceRef="Gateway_0balowq" targetRef="Event_0wmrvj1" />     <bpmn:sequenceFlow id="Flow_0lst3zv" name="Not Ok" sourceRef="Gateway_0balowq" targetRef="Activity_1avb052" />   </bpmn:process>   <bpmndi:BPMNDiagram id="BPMNDiagram_1">     <bpmndi:BPMNPlane id="BPMNPlane_1" bpmnElement="Collaboration_0msf5rh">       <bpmndi:BPMNShape id="Participant_1dpdn6p_di" bpmnElement="Participant_1dpdn6p" isHorizontal="true">         <dc:Bounds x="190" y="40" width="710" height="310" />       </bpmndi:BPMNShape>       <bpmndi:BPMNEdge id="Flow_0ufuik6_di" bpmnElement="Flow_0ufuik6">         <di:waypoint x="278" y="150" />         <di:waypoint x="340" y="150" />       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_0jlqzbv_di" bpmnElement="Flow_0jlqzbv">         <di:waypoint x="440" y="150" />         <di:waypoint x="515" y="150" />       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_1x1en9f_di" bpmnElement="Flow_1x1en9f">         <di:waypoint x="540" y="125" />         <di:waypoint x="540" y="50" />         <di:waypoint x="390" y="50" />         <di:waypoint x="390" y="110" />         <bpmndi:BPMNLabel>           <dc:Bounds x="448" y="53" width="35" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_1yadp7s_di" bpmnElement="Flow_1yadp7s">         <di:waypoint x="565" y="150" />         <di:waypoint x="640" y="150" />         <bpmndi:BPMNLabel>           <dc:Bounds x="595" y="132" width="15" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_14xplzk_di" bpmnElement="Flow_14xplzk">         <di:waypoint x="740" y="150" />         <di:waypoint x="805" y="150" />       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_1r5ghn4_di" bpmnElement="Flow_1r5ghn4">         <di:waypoint x="830" y="125" />         <di:waypoint x="830" y="50" />         <di:waypoint x="690" y="50" />         <di:waypoint x="690" y="110" />         <bpmndi:BPMNLabel>           <dc:Bounds x="743" y="53" width="35" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_0bacyby_di" bpmnElement="Flow_0bacyby">         <di:waypoint x="830" y="175" />         <di:waypoint x="830" y="240" />         <bpmndi:BPMNLabel>           <dc:Bounds x="838" y="205" width="15" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_1v39yum_di" bpmnElement="Flow_1v39yum">         <di:waypoint x="780" y="280" />         <di:waypoint x="715" y="280" />       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_1qztjd5_di" bpmnElement="Flow_1qztjd5">         <di:waypoint x="690" y="255" />         <di:waypoint x="690" y="200" />         <di:waypoint x="790" y="200" />         <di:waypoint x="790" y="240" />         <bpmndi:BPMNLabel>           <dc:Bounds x="723" y="203" width="35" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_056edb0_di" bpmnElement="Flow_056edb0">         <di:waypoint x="665" y="280" />         <di:waypoint x="570" y="280" />         <bpmndi:BPMNLabel>           <dc:Bounds x="610" y="262" width="15" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_0mz8g4i_di" bpmnElement="Flow_0mz8g4i">         <di:waypoint x="470" y="280" />         <di:waypoint x="395" y="280" />       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_0qplcfp_di" bpmnElement="Flow_0qplcfp">         <di:waypoint x="345" y="280" />         <di:waypoint x="278" y="280" />         <bpmndi:BPMNLabel>           <dc:Bounds x="304" y="262" width="15" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_0lst3zv_di" bpmnElement="Flow_0lst3zv">         <di:waypoint x="370" y="255" />         <di:waypoint x="370" y="200" />         <di:waypoint x="490" y="200" />         <di:waypoint x="490" y="240" />         <bpmndi:BPMNLabel>           <dc:Bounds x="413" y="203" width="35" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNShape id="Event_00ivwir_di" bpmnElement="Event_00ivwir">         <dc:Bounds x="242" y="132" width="36" height="36" />       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Activity_0b44uyr_di" bpmnElement="Activity_0b44uyr">         <dc:Bounds x="340" y="110" width="100" height="80" />       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Gateway_0a2g599_di" bpmnElement="Gateway_0a2g599" isMarkerVisible="true">         <dc:Bounds x="515" y="125" width="50" height="50" />         <bpmndi:BPMNLabel>           <dc:Bounds x="524" y="182" width="32" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Activity_12pbov6_di" bpmnElement="Activity_12pbov6">         <dc:Bounds x="640" y="110" width="100" height="80" />       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Gateway_190p5r1_di" bpmnElement="Gateway_190p5r1" isMarkerVisible="true">         <dc:Bounds x="805" y="125" width="50" height="50" />         <bpmndi:BPMNLabel>           <dc:Bounds x="844" y="163" width="32" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Activity_18wcxg1_di" bpmnElement="Activity_18wcxg1">         <dc:Bounds x="780" y="240" width="100" height="80" />       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Gateway_1ssqwu7_di" bpmnElement="Gateway_1ssqwu7" isMarkerVisible="true">         <dc:Bounds x="665" y="255" width="50" height="50" />         <bpmndi:BPMNLabel>           <dc:Bounds x="674" y="312" width="32" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Activity_1avb052_di" bpmnElement="Activity_1avb052">         <dc:Bounds x="470" y="240" width="100" height="80" />       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Gateway_0balowq_di" bpmnElement="Gateway_0balowq" isMarkerVisible="true">         <dc:Bounds x="345" y="255" width="50" height="50" />         <bpmndi:BPMNLabel>           <dc:Bounds x="354" y="312" width="32" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Event_0wmrvj1_di" bpmnElement="Event_0wmrvj1">         <dc:Bounds x="242" y="262" width="36" height="36" />       </bpmndi:BPMNShape>     </bpmndi:BPMNPlane>   </bpmndi:BPMNDiagram> </bpmn:definitions>''''') ;
ALTER SEQUENCE "public"."assemble_processes_id_seq" RESTART WITH 12 INCREMENT BY 1;
DROP INDEX IF EXISTS "PRIMARY00002";
ALTER TABLE "public"."assemble_processes" ADD CONSTRAINT "PRIMARY00002" PRIMARY KEY ("id");
DROP INDEX IF EXISTS "assemble_processes_project_id_foreign";
CREATE INDEX "assemble_processes_project_id_foreign00000" ON "public"."assemble_processes" ("project_id");

/*
Dumping data for table 'public.assemble_processes'
*/

INSERT INTO "public"."assemble_processes"("id", "created_at", "updated_at", "name", "status", "project_id", "type", "diagram") VALUES (1, '2020-04-15 19:30:17', '2020-04-15 19:30:17', 'p1', 'created', 1, 'r', '');
INSERT INTO "public"."assemble_processes"("id", "created_at", "updated_at", "name", "status", "project_id", "type", "diagram") VALUES (2, '2020-04-18 22:20:14', '2020-04-18 22:20:14', 'Test', 'created', 1, 'r', '');
INSERT INTO "public"."assemble_processes"("id", "created_at", "updated_at", "name", "status", "project_id", "type", "diagram") VALUES (7, '2020-04-18 22:41:58', '2020-04-18 22:41:58', 'Scop 3', 'created', 1, 's', '');
INSERT INTO "public"."assemble_processes"("id", "created_at", "updated_at", "name", "status", "project_id", "type", "diagram") VALUES (8, '2020-05-24 07:54:22', '2020-05-27 10:54:16', 'Retrieval Process', 'created', 6, 'r', '''<?xml version="1.0" encoding="UTF-8"?><bpmn:definitions xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:bpmn="http://www.omg.org/spec/BPMN/20100524/MODEL" xmlns:bpmndi="http://www.omg.org/spec/BPMN/20100524/DI" xmlns:dc="http://www.omg.org/spec/DD/20100524/DC" xmlns:di="http://www.omg.org/spec/DD/20100524/DI" id="Definitions_014zzan" targetNamespace="http://bpmn.io/schema/bpmn" exporter="bpmn-js (https://demo.bpmn.io)" exporterVersion="6.5.1">  <bpmn:collaboration id="Collaboration_0msf5rh">    <bpmn:participant id="Participant_1dpdn6p" name="Assembled Process" processRef="Process_0nqp456" />  </bpmn:collaboration>  <bpmn:process id="Process_0nqp456" isExecutable="false">    <bpmn:startEvent id="Event_00ivwir">      <bpmn:outgoing>Flow_0ufuik6</bpmn:outgoing>    </bpmn:startEvent>    <bpmn:task id="Activity_0b44uyr" name="Divide features with LSI">      <bpmn:incoming>Flow_0ufuik6</bpmn:incoming>      <bpmn:incoming>Flow_1x1en9f</bpmn:incoming>      <bpmn:outgoing>Flow_0jlqzbv</bpmn:outgoing>    </bpmn:task>    <bpmn:sequenceFlow id="Flow_0ufuik6" sourceRef="Event_00ivwir" targetRef="Activity_0b44uyr" />    <bpmn:exclusiveGateway id="Gateway_0a2g599" name="Check">      <bpmn:incoming>Flow_0jlqzbv</bpmn:incoming>      <bpmn:outgoing>Flow_1x1en9f</bpmn:outgoing>      <bpmn:outgoing>Flow_1yadp7s</bpmn:outgoing>    </bpmn:exclusiveGateway>    <bpmn:sequenceFlow id="Flow_0jlqzbv" sourceRef="Activity_0b44uyr" targetRef="Gateway_0a2g599" />    <bpmn:sequenceFlow id="Flow_1x1en9f" name="Not Ok" sourceRef="Gateway_0a2g599" targetRef="Activity_0b44uyr" />    <bpmn:exclusiveGateway id="Gateway_190p5r1" name="Check">      <bpmn:incoming>Flow_14xplzk</bpmn:incoming>      <bpmn:outgoing>Flow_1r5ghn4</bpmn:outgoing>      <bpmn:outgoing>Flow_0bacyby</bpmn:outgoing>    </bpmn:exclusiveGateway>    <bpmn:sequenceFlow id="Flow_1r5ghn4" name="Not Ok" sourceRef="Gateway_190p5r1" targetRef="Activity_12pbov6" />    <bpmn:task id="Activity_12pbov6" name="Fragment variable partitions with FCA">      <bpmn:incoming>Flow_1yadp7s</bpmn:incoming>      <bpmn:incoming>Flow_1r5ghn4</bpmn:incoming>      <bpmn:outgoing>Flow_14xplzk</bpmn:outgoing>    </bpmn:task>    <bpmn:sequenceFlow id="Flow_14xplzk" sourceRef="Activity_12pbov6" targetRef="Gateway_190p5r1" />    <bpmn:sequenceFlow id="Flow_1yadp7s" name="Ok" sourceRef="Gateway_0a2g599" targetRef="Activity_12pbov6" />    <bpmn:sequenceFlow id="Flow_0bacyby" name="Ok" sourceRef="Gateway_190p5r1" targetRef="Activity_18wcxg1" />    <bpmn:task id="Activity_18wcxg1" name="Derive code-topics from common class partitions;">      <bpmn:incoming>Flow_0bacyby</bpmn:incoming>      <bpmn:incoming>Flow_1qztjd5</bpmn:incoming>      <bpmn:outgoing>Flow_1v39yum</bpmn:outgoing>    </bpmn:task>    <bpmn:exclusiveGateway id="Gateway_1ssqwu7" name="Check">      <bpmn:incoming>Flow_1v39yum</bpmn:incoming>      <bpmn:outgoing>Flow_1qztjd5</bpmn:outgoing>      <bpmn:outgoing>Flow_056edb0</bpmn:outgoing>    </bpmn:exclusiveGateway>    <bpmn:task id="Activity_1avb052" name="Perform traceability links between features andÂ  code-topics;">      <bpmn:incoming>Flow_056edb0</bpmn:incoming>      <bpmn:incoming>Flow_0lst3zv</bpmn:incoming>      <bpmn:outgoing>Flow_0mz8g4i</bpmn:outgoing>    </bpmn:task>    <bpmn:exclusiveGateway id="Gateway_0balowq" name="Check">      <bpmn:incoming>Flow_0mz8g4i</bpmn:incoming>      <bpmn:outgoing>Flow_0lst3zv</bpmn:outgoing>      <bpmn:outgoing>Flow_1lwp680</bpmn:outgoing>    </bpmn:exclusiveGateway>    <bpmn:task id="Activity_03qxj4x" name="Determine feature implementation">      <bpmn:incoming>Flow_1lwp680</bpmn:incoming>      <bpmn:incoming>Flow_032gd26</bpmn:incoming>      <bpmn:outgoing>Flow_0vd0efi</bpmn:outgoing>    </bpmn:task>    <bpmn:sequenceFlow id="Flow_1qztjd5" name="Not Ok" sourceRef="Gateway_1ssqwu7" targetRef="Activity_18wcxg1" />    <bpmn:sequenceFlow id="Flow_1v39yum" sourceRef="Activity_18wcxg1" targetRef="Gateway_1ssqwu7" />    <bpmn:sequenceFlow id="Flow_056edb0" name="Ok" sourceRef="Gateway_1ssqwu7" targetRef="Activity_1avb052" />    <bpmn:sequenceFlow id="Flow_0lst3zv" name="Not Ok" sourceRef="Gateway_0balowq" targetRef="Activity_1avb052" />    <bpmn:sequenceFlow id="Flow_0mz8g4i" sourceRef="Activity_1avb052" targetRef="Gateway_0balowq" />    <bpmn:sequenceFlow id="Flow_1lwp680" name="Ok" sourceRef="Gateway_0balowq" targetRef="Activity_03qxj4x" />    <bpmn:endEvent id="Event_0wmrvj1">      <bpmn:incoming>Flow_0kfbf9s</bpmn:incoming>    </bpmn:endEvent>    <bpmn:exclusiveGateway id="Gateway_1p20o9b" name="Check">      <bpmn:incoming>Flow_0vd0efi</bpmn:incoming>      <bpmn:outgoing>Flow_0kfbf9s</bpmn:outgoing>      <bpmn:outgoing>Flow_032gd26</bpmn:outgoing>    </bpmn:exclusiveGateway>    <bpmn:sequenceFlow id="Flow_0vd0efi" sourceRef="Activity_03qxj4x" targetRef="Gateway_1p20o9b" />    <bpmn:sequenceFlow id="Flow_0kfbf9s" name="Ok" sourceRef="Gateway_1p20o9b" targetRef="Event_0wmrvj1" />    <bpmn:sequenceFlow id="Flow_032gd26" name="Not Ok" sourceRef="Gateway_1p20o9b" targetRef="Activity_03qxj4x" />  </bpmn:process>  <bpmndi:BPMNDiagram id="BPMNDiagram_1">    <bpmndi:BPMNPlane id="BPMNPlane_1" bpmnElement="Collaboration_0msf5rh">      <bpmndi:BPMNShape id="Participant_1dpdn6p_di" bpmnElement="Participant_1dpdn6p" isHorizontal="true">        <dc:Bounds x="190" y="40" width="770" height="310" />      </bpmndi:BPMNShape>      <bpmndi:BPMNEdge id="Flow_032gd26_di" bpmnElement="Flow_032gd26">        <di:waypoint x="330" y="255" />        <di:waypoint x="330" y="220" />        <di:waypoint x="440" y="220" />        <di:waypoint x="440" y="240" />         <bpmndi:BPMNLabel>           <dc:Bounds x="368" y="202" width="35" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_0kfbf9s_di" bpmnElement="Flow_0kfbf9s">         <di:waypoint x="305" y="280" />         <di:waypoint x="268" y="280" />         <bpmndi:BPMNLabel>           <dc:Bounds x="279" y="262" width="15" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_0vd0efi_di" bpmnElement="Flow_0vd0efi">         <di:waypoint x="390" y="280" />         <di:waypoint x="355" y="280" />       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_1lwp680_di" bpmnElement="Flow_1lwp680">         <di:waypoint x="515" y="280" />         <di:waypoint x="490" y="280" />         <bpmndi:BPMNLabel>           <dc:Bounds x="495" y="262" width="15" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_0mz8g4i_di" bpmnElement="Flow_0mz8g4i">         <di:waypoint x="580" y="280" />         <di:waypoint x="565" y="280" />       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_0lst3zv_di" bpmnElement="Flow_0lst3zv">         <di:waypoint x="540" y="255" />         <di:waypoint x="540" y="200" />         <di:waypoint x="600" y="200" />         <di:waypoint x="600" y="240" />         <bpmndi:BPMNLabel>           <dc:Bounds x="553" y="203" width="35" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_056edb0_di" bpmnElement="Flow_056edb0">         <di:waypoint x="715" y="280" />         <di:waypoint x="680" y="280" />         <bpmndi:BPMNLabel>           <dc:Bounds x="690" y="262" width="15" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_1v39yum_di" bpmnElement="Flow_1v39yum">         <di:waypoint x="830" y="280" />         <di:waypoint x="765" y="280" />       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_1qztjd5_di" bpmnElement="Flow_1qztjd5">         <di:waypoint x="740" y="255" />         <di:waypoint x="740" y="200" />         <di:waypoint x="840" y="200" />         <di:waypoint x="840" y="240" />         <bpmndi:BPMNLabel>           <dc:Bounds x="773" y="203" width="35" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_0bacyby_di" bpmnElement="Flow_0bacyby">         <di:waypoint x="855" y="150" />         <di:waypoint x="880" y="150" />         <di:waypoint x="880" y="240" />         <bpmndi:BPMNLabel>           <dc:Bounds x="892" y="203" width="15" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_1yadp7s_di" bpmnElement="Flow_1yadp7s">         <di:waypoint x="565" y="150" />         <di:waypoint x="640" y="150" />         <bpmndi:BPMNLabel>           <dc:Bounds x="595" y="132" width="15" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_14xplzk_di" bpmnElement="Flow_14xplzk">         <di:waypoint x="740" y="150" />         <di:waypoint x="805" y="150" />       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_1r5ghn4_di" bpmnElement="Flow_1r5ghn4">         <di:waypoint x="830" y="125" />         <di:waypoint x="830" y="50" />         <di:waypoint x="690" y="50" />         <di:waypoint x="690" y="110" />         <bpmndi:BPMNLabel>           <dc:Bounds x="743" y="53" width="35" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_1x1en9f_di" bpmnElement="Flow_1x1en9f">         <di:waypoint x="540" y="125" />         <di:waypoint x="540" y="50" />         <di:waypoint x="390" y="50" />         <di:waypoint x="390" y="110" />         <bpmndi:BPMNLabel>           <dc:Bounds x="448" y="53" width="35" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_0jlqzbv_di" bpmnElement="Flow_0jlqzbv">         <di:waypoint x="440" y="150" />         <di:waypoint x="515" y="150" />       </bpmndi:BPMNEdge>       <bpmndi:BPMNEdge id="Flow_0ufuik6_di" bpmnElement="Flow_0ufuik6">         <di:waypoint x="278" y="150" />         <di:waypoint x="340" y="150" />       </bpmndi:BPMNEdge>       <bpmndi:BPMNShape id="Event_00ivwir_di" bpmnElement="Event_00ivwir">         <dc:Bounds x="242" y="132" width="36" height="36" />       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Activity_0b44uyr_di" bpmnElement="Activity_0b44uyr">         <dc:Bounds x="340" y="110" width="100" height="80" />       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Gateway_0a2g599_di" bpmnElement="Gateway_0a2g599" isMarkerVisible="true">         <dc:Bounds x="515" y="125" width="50" height="50" />         <bpmndi:BPMNLabel>           <dc:Bounds x="524" y="173" width="32" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Gateway_190p5r1_di" bpmnElement="Gateway_190p5r1" isMarkerVisible="true">         <dc:Bounds x="805" y="125" width="50" height="50" />         <bpmndi:BPMNLabel>           <dc:Bounds x="844" y="163" width="32" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Activity_12pbov6_di" bpmnElement="Activity_12pbov6">         <dc:Bounds x="640" y="110" width="100" height="80" />       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Activity_18wcxg1_di" bpmnElement="Activity_18wcxg1">         <dc:Bounds x="830" y="240" width="100" height="80" />       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Gateway_1ssqwu7_di" bpmnElement="Gateway_1ssqwu7" isMarkerVisible="true">         <dc:Bounds x="715" y="255" width="50" height="50" />         <bpmndi:BPMNLabel>           <dc:Bounds x="724" y="312" width="32" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Activity_1avb052_di" bpmnElement="Activity_1avb052">         <dc:Bounds x="580" y="240" width="100" height="80" />       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Gateway_0balowq_di" bpmnElement="Gateway_0balowq" isMarkerVisible="true">         <dc:Bounds x="515" y="255" width="50" height="50" />         <bpmndi:BPMNLabel>           <dc:Bounds x="524" y="312" width="32" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Activity_03qxj4x_di" bpmnElement="Activity_03qxj4x">         <dc:Bounds x="390" y="240" width="100" height="80" />       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Event_0wmrvj1_di" bpmnElement="Event_0wmrvj1">         <dc:Bounds x="232" y="262" width="36" height="36" />       </bpmndi:BPMNShape>       <bpmndi:BPMNShape id="Gateway_1p20o9b_di" bpmnElement="Gateway_1p20o9b" isMarkerVisible="true">         <dc:Bounds x="305" y="255" width="50" height="50" />         <bpmndi:BPMNLabel>           <dc:Bounds x="314" y="312" width="32" height="14" />         </bpmndi:BPMNLabel>       </bpmndi:BPMNShape>     </bpmndi:BPMNPlane>   </bpmndi:BPMNDiagram> </bpmn:definitions> ''');




INSERT INTO "public"."assemble_processes"("id", "created_at", "updated_at", "name", "status", "project_id", "type", "diagram") VALUES (11, '2020-05-24 12:20:19', '2020-05-24 12:20:49', 'Scoping 2', 'created', 6, 's', '''<?xml version="1.0" encoding="UTF-8"?>
<bpmn:definitions xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:bpmn="http://www.omg.org/spec/BPMN/20100524/MODEL" xmlns:bpmndi="http://www.omg.org/spec/BPMN/20100524/DI" xmlns:dc="http://www.omg.org/spec/DD/20100524/DC" xmlns:di="http://www.omg.org/spec/DD/20100524/DI" id="Definitions_014zzan" targetNamespace="http://bpmn.io/schema/bpmn" exporter="bpmn-js (https://demo.bpmn.io)" exporterVersion="6.5.1"><bpmn:collaboration id="Collaboration_0msf5rh">    <bpmn:participant id="Participant_1dpdn6p" name="Generic Scoping Process" processRef="Process_0nqp456" />  </bpmn:collaboration>  <bpmn:process id="Process_0nqp456" isExecutable="false">    <bpmn:startEvent id="Event_00ivwir">      <bpmn:outgoing>Flow_0ufuik6</bpmn:outgoing>    </bpmn:startEvent>    <bpmn:task id="Activity_0b44uyr" name="Pre-Scoping">      <bpmn:incoming>Flow_0ufuik6</bpmn:incoming>      <bpmn:outgoing>Flow_0jlqzbv</bpmn:outgoing>    </bpmn:task>    <bpmn:inclusiveGateway id="Gateway_0a2g599">      <bpmn:incoming>Flow_0jlqzbv</bpmn:incoming>      <bpmn:outgoing>Flow_0m75xu5</bpmn:outgoing>      <bpmn:outgoing>Flow_0ykmxxp</bpmn:outgoing>    </bpmn:inclusiveGateway>    <bpmn:inclusiveGateway id="Gateway_190p5r1">      <bpmn:incoming>Flow_046vew3</bpmn:incoming>      <bpmn:incoming>Flow_06bnwyz</bpmn:incoming>      <bpmn:outgoing>Flow_1jbyuhf</bpmn:outgoing>    </bpmn:inclusiveGateway>    <bpmn:task id="Activity_0k6qsjk" name="Scoping Closure">      <bpmn:incoming>Flow_1jbyuhf</bpmn:incoming>      <bpmn:outgoing>Flow_1vot7x3</bpmn:outgoing>    </bpmn:task>    <bpmn:task id="Activity_0jajyfo" name="Domain Scoping">      <bpmn:incoming>Flow_0m75xu5</bpmn:incoming>      <bpmn:outgoing>Flow_06bnwyz</bpmn:outgoing>    </bpmn:task>    <bpmn:task id="Activity_0u9knnc" name="Asset Scoping">      <bpmn:incoming>Flow_0ykmxxp</bpmn:incoming>      <bpmn:outgoing>Flow_046vew3</bpmn:outgoing>    </bpmn:task>    <bpmn:endEvent id="Event_0wmrvj1">      <bpmn:incoming>Flow_1vot7x3</bpmn:incoming>    </bpmn:endEvent>    <bpmn:sequenceFlow id="Flow_0jlqzbv" sourceRef="Activity_0b44uyr" targetRef="Gateway_0a2g599" />    <bpmn:sequenceFlow id="Flow_0ufuik6" sourceRef="Event_00ivwir" targetRef="Activity_0b44uyr" />    <bpmn:sequenceFlow id="Flow_1jbyuhf" sourceRef="Gateway_190p5r1" targetRef="Activity_0k6qsjk" />    <bpmn:sequenceFlow id="Flow_1vot7x3" sourceRef="Activity_0k6qsjk" targetRef="Event_0wmrvj1" />    <bpmn:sequenceFlow id="Flow_0m75xu5" sourceRef="Gateway_0a2g599" targetRef="Activity_0jajyfo" />    <bpmn:sequenceFlow id="Flow_0ykmxxp" sourceRef="Gateway_0a2g599" targetRef="Activity_0u9knnc" />    <bpmn:sequenceFlow id="Flow_046vew3" sourceRef="Activity_0u9knnc" targetRef="Gateway_190p5r1" />    <bpmn:sequenceFlow id="Flow_06bnwyz" sourceRef="Activity_0jajyfo" targetRef="Gateway_190p5r1" />  </bpmn:process>  <bpmndi:BPMNDiagram id="BPMNDiagram_1">    <bpmndi:BPMNPlane id="BPMNPlane_1" bpmnElement="Collaboration_0msf5rh">      <bpmndi:BPMNShape id="Participant_1dpdn6p_di" bpmnElement="Participant_1dpdn6p" isHorizontal="true">        <dc:Bounds x="180" y="-10" width="820" height="300" />      </bpmndi:BPMNShape>      <bpmndi:BPMNEdge id="Flow_06bnwyz_di" bpmnElement="Flow_06bnwyz">        <di:waypoint x="660" y="50" />        <di:waypoint x="740" y="50" />        <di:waypoint x="740" y="115" />      </bpmndi:BPMNEdge>      <bpmndi:BPMNEdge id="Flow_046vew3_di" bpmnElement="Flow_046vew3">        <di:waypoint x="660" y="230" />        <di:waypoint x="740" y="230" />        <di:waypoint x="740" y="165" />      </bpmndi:BPMNEdge>      <bpmndi:BPMNEdge id="Flow_0ykmxxp_di" bpmnElement="Flow_0ykmxxp">        <di:waypoint x="490" y="165" />        <di:waypoint x="490" y="230" />        <di:waypoint x="560" y="230" />      </bpmndi:BPMNEdge>      <bpmndi:BPMNEdge id="Flow_0m75xu5_di" bpmnElement="Flow_0m75xu5">        <di:waypoint x="490" y="115" />        <di:waypoint x="490" y="50" />        <di:waypoint x="560" y="50" />      </bpmndi:BPMNEdge>      <bpmndi:BPMNEdge id="Flow_1vot7x3_di" bpmnElement="Flow_1vot7x3">        <di:waypoint x="910" y="140" />        <di:waypoint x="942" y="140" />      </bpmndi:BPMNEdge>      <bpmndi:BPMNEdge id="Flow_1jbyuhf_di" bpmnElement="Flow_1jbyuhf">        <di:waypoint x="765" y="140" />        <di:waypoint x="810" y="140" />      </bpmndi:BPMNEdge>      <bpmndi:BPMNEdge id="Flow_0ufuik6_di" bpmnElement="Flow_0ufuik6">        <di:waypoint x="268" y="140" />        <di:waypoint x="330" y="140" />      </bpmndi:BPMNEdge>     <bpmndi:BPMNEdge id="Flow_0jlqzbv_di" bpmnElement="Flow_0jlqzbv">        <di:waypoint x="430" y="140" />        <di:waypoint x="465" y="140" />      </bpmndi:BPMNEdge>      <bpmndi:BPMNShape id="Event_00ivwir_di" bpmnElement="Event_00ivwir">        <dc:Bounds x="232" y="122" width="36" height="36" />      </bpmndi:BPMNShape>      <bpmndi:BPMNShape id="Activity_0b44uyr_di" bpmnElement="Activity_0b44uyr">        <dc:Bounds x="330" y="100" width="100" height="80" />      </bpmndi:BPMNShape>      <bpmndi:BPMNShape id="Gateway_1kut6rf_di" bpmnElement="Gateway_0a2g599">        <dc:Bounds x="465" y="115" width="50" height="50" />        <bpmndi:BPMNLabel>          <dc:Bounds x="474" y="182" width="32" height="14" />        </bpmndi:BPMNLabel>      </bpmndi:BPMNShape>      <bpmndi:BPMNShape id="Gateway_15h81z8_di" bpmnElement="Gateway_190p5r1">        <dc:Bounds x="715" y="115" width="50" height="50" />        <bpmndi:BPMNLabel>          <dc:Bounds x="754" y="163" width="32" height="14" />        </bpmndi:BPMNLabel>      </bpmndi:BPMNShape>      <bpmndi:BPMNShape id="Activity_0k6qsjk_di" bpmnElement="Activity_0k6qsjk">        <dc:Bounds x="810" y="100" width="100" height="80" />      </bpmndi:BPMNShape>      <bpmndi:BPMNShape id="Activity_0jajyfo_di" bpmnElement="Activity_0jajyfo">        <dc:Bounds x="560" y="10" width="100" height="80" />      </bpmndi:BPMNShape>      <bpmndi:BPMNShape id="Activity_0u9knnc_di" bpmnElement="Activity_0u9knnc">        <dc:Bounds x="560" y="190" width="100" height="80" />      </bpmndi:BPMNShape>      <bpmndi:BPMNShape id="Event_0wmrvj1_di" bpmnElement="Event_0wmrvj1">        <dc:Bounds x="942" y="122" width="36" height="36" />      </bpmndi:BPMNShape>    </bpmndi:BPMNPlane>  </bpmndi:BPMNDiagram></bpmn:definitions>''');

/*
Table structure for table 'public.experiences'
*/

DROP TABLE IF EXISTS "public"."experiences" CASCADE;
CREATE UNLOGGED TABLE "public"."experiences" ("id" BIGSERIAL NOT NULL, "created_at" TIMESTAMP, "updated_at" TIMESTAMP, "time" INTEGER NOT NULL, "difficulty" TEXT NOT NULL, "obs" TEXT, "assemble_process_id" BIGINT NOT NULL, "activity_id" BIGINT NOT NULL) ;
ALTER SEQUENCE "public"."experiences_id_seq" RESTART WITH 9 INCREMENT BY 1;
DROP INDEX IF EXISTS "PRIMARY00003";
ALTER TABLE "public"."experiences" ADD CONSTRAINT "PRIMARY00003" PRIMARY KEY ("id");
DROP INDEX IF EXISTS "experiences_assemble_process_id_foreign";
CREATE INDEX "experiences_assemble_process_id_foreign00000" ON "public"."experiences" ("assemble_process_id");
DROP INDEX IF EXISTS "experiences_activity_id_foreign";
CREATE INDEX "experiences_activity_id_foreign00000" ON "public"."experiences" ("activity_id");

/*
Dumping data for table 'public.experiences'
*/

INSERT INTO "public"."experiences"("id", "created_at", "updated_at", "time", "difficulty", "obs", "assemble_process_id", "activity_id") VALUES (5, '2020-06-06 18:33:29', '2020-06-06 18:38:16', 13, '13', '13', 1, 2);
INSERT INTO "public"."experiences"("id", "created_at", "updated_at", "time", "difficulty", "obs", "assemble_process_id", "activity_id") VALUES (8, '2020-06-06 18:40:22', '2020-06-06 18:40:22', 2, '22', '2', 1, 1);

/*
Table structure for table 'public.failed_jobs'
*/

DROP TABLE IF EXISTS "public"."failed_jobs" CASCADE;
CREATE UNLOGGED TABLE "public"."failed_jobs" ("id" BIGSERIAL NOT NULL, "connection" TEXT NOT NULL, "queue" TEXT NOT NULL, "payload" TEXT NOT NULL, "exception" TEXT NOT NULL, "failed_at" TIMESTAMP NOT NULL) ;
ALTER SEQUENCE "public"."failed_jobs_id_seq" RESTART WITH 1 INCREMENT BY 1;
DROP INDEX IF EXISTS "PRIMARY00004";
ALTER TABLE "public"."failed_jobs" ADD CONSTRAINT "PRIMARY00004" PRIMARY KEY ("id");

/*
Dumping data for table 'public.failed_jobs'
*/


/*
Table structure for table 'public.feature_artifacts'
*/

DROP TABLE IF EXISTS "public"."feature_artifacts" CASCADE;
CREATE UNLOGGED TABLE "public"."feature_artifacts" ("id" BIGSERIAL NOT NULL, "created_at" TIMESTAMP, "updated_at" TIMESTAMP, "feature_id" BIGINT NOT NULL, "artifact_id" BIGINT NOT NULL) ;
ALTER SEQUENCE "public"."feature_artifacts_id_seq" RESTART WITH 5 INCREMENT BY 1;
DROP INDEX IF EXISTS "PRIMARY00005";
ALTER TABLE "public"."feature_artifacts" ADD CONSTRAINT "PRIMARY00005" PRIMARY KEY ("id");
DROP INDEX IF EXISTS "feature_artifacts_feature_id_foreign";
CREATE INDEX "feature_artifacts_feature_id_foreign00000" ON "public"."feature_artifacts" ("feature_id");
DROP INDEX IF EXISTS "feature_artifacts_artifact_id_foreign";
CREATE INDEX "feature_artifacts_artifact_id_foreign00000" ON "public"."feature_artifacts" ("artifact_id");

/*
Dumping data for table 'public.feature_artifacts'
*/

INSERT INTO "public"."feature_artifacts"("id", "created_at", "updated_at", "feature_id", "artifact_id") VALUES (1, '2020-06-06 16:48:44', '2020-06-06 16:48:44', 4, 15);
INSERT INTO "public"."feature_artifacts"("id", "created_at", "updated_at", "feature_id", "artifact_id") VALUES (2, '2020-06-10 21:06:58', '2020-06-10 21:06:58', 31, 20);
INSERT INTO "public"."feature_artifacts"("id", "created_at", "updated_at", "feature_id", "artifact_id") VALUES (3, '2020-06-10 21:07:08', '2020-06-10 21:07:08', 32, 23);
INSERT INTO "public"."feature_artifacts"("id", "created_at", "updated_at", "feature_id", "artifact_id") VALUES (4, '2020-06-10 21:07:23', '2020-06-10 21:07:23', 24, 20);

/*
Table structure for table 'public.feature_models'
*/

DROP TABLE IF EXISTS "public"."feature_models" CASCADE;
CREATE UNLOGGED TABLE "public"."feature_models" ("id" BIGSERIAL NOT NULL, "created_at" TIMESTAMP, "updated_at" TIMESTAMP, "name" VARCHAR(255)  NOT NULL, "xml" TEXT NOT NULL, "project_id" BIGINT NOT NULL) ;
ALTER SEQUENCE "public"."feature_models_id_seq" RESTART WITH 4 INCREMENT BY 1;
DROP INDEX IF EXISTS "PRIMARY00006";
ALTER TABLE "public"."feature_models" ADD CONSTRAINT "PRIMARY00006" PRIMARY KEY ("id");
DROP INDEX IF EXISTS "feature_models_project_id_foreign";
CREATE INDEX "feature_models_project_id_foreign00000" ON "public"."feature_models" ("project_id");

/*
Dumping data for table 'public.feature_models'
*/

INSERT INTO "public"."feature_models"("id", "created_at", "updated_at", "name", "xml", "project_id") VALUES (2, '2020-06-04 20:33:16', '2020-06-04 20:33:25', 'SPL1', '''<?xml version="1.0" encoding="UTF-8" standalone="no"?>        <featureModel chosenLayoutAlgorithm="1">            <struct>                <and mandatory="true" name="Fm2">                    <feature name="Feature1"/>                    <feature name="Feature2"/>                  </and>            </struct>            <constraints>             </constraints>            <comments/>            <featureOrder userDefined="false"/>        </featureModel>''', 1);
INSERT INTO "public"."feature_models"("id", "created_at", "updated_at", "name", "xml", "project_id") VALUES (3, '2020-06-10 21:00:17', '2020-06-10 21:00:17', 'Text Editing System', '''<?xml version="1.0" encoding="UTF-8" standalone="no"?>        <featureModel chosenLayoutAlgorithm="1">            <struct>                <and mandatory="true" name="Text Editing System">                    <feature name="Feature1"/>                    <feature name="Feature2"/>                  </and>            </struct>            <constraints>             </constraints>            <comments/>            <featureOrder userDefined="false"/>        </featureModel>''', 6);

/*
Table structure for table 'public.features'
*/

DROP TABLE IF EXISTS "public"."features" CASCADE;
CREATE UNLOGGED TABLE "public"."features" ("id" BIGSERIAL NOT NULL, "created_at" TIMESTAMP, "updated_at" TIMESTAMP, "name" VARCHAR(255)  NOT NULL, "type" VARCHAR(255)  NOT NULL, "height" INTEGER NOT NULL, "description" TEXT NOT NULL, "abstract" SMALLINT DEFAULT 0 NOT NULL, "feature_model_id" BIGINT NOT NULL, "parent" BIGINT) ;
ALTER SEQUENCE "public"."features_id_seq" RESTART WITH 33 INCREMENT BY 1;
DROP INDEX IF EXISTS "PRIMARY00007";
ALTER TABLE "public"."features" ADD CONSTRAINT "PRIMARY00007" PRIMARY KEY ("id");
DROP INDEX IF EXISTS "features_fm_id_foreign";
CREATE INDEX "features_fm_id_foreign00000" ON "public"."features" ("feature_model_id");
DROP INDEX IF EXISTS "features_parent_foreign";
CREATE INDEX "features_parent_foreign00000" ON "public"."features" ("parent");

/*
Dumping data for table 'public.features'
*/

INSERT INTO "public"."features"("id", "created_at", "updated_at", "name", "type", "height", "description", "abstract", "feature_model_id", "parent") VALUES (2, '2020-06-04 20:33:16', '2020-06-04 20:33:25', 'SPL1', 'Mandatory', 0, 'SPL core.', 1, 2, NULL);
INSERT INTO "public"."features"("id", "created_at", "updated_at", "name", "type", "height", "description", "abstract", "feature_model_id", "parent") VALUES (4, '2020-06-04 21:34:35', '2020-06-06 16:23:51', 'essaqe', 'OR Alternative', 2, 'fee', 0, 2, 10);
INSERT INTO "public"."features"("id", "created_at", "updated_at", "name", "type", "height", "description", "abstract", "feature_model_id", "parent") VALUES (10, '2020-06-04 22:04:32', '2020-06-04 22:04:38', 'fe', 'Optional', 1, 'fe', 1, 2, 2);
INSERT INTO "public"."features"("id", "created_at", "updated_at", "name", "type", "height", "description", "abstract", "feature_model_id", "parent") VALUES (11, '2020-06-07 21:13:32', '2020-06-07 22:29:34', 'f5', 'Mandatory', 1, 'f', 0, 2, 2);
INSERT INTO "public"."features"("id", "created_at", "updated_at", "name", "type", "height", "description", "abstract", "feature_model_id", "parent") VALUES (12, '2020-06-07 21:14:38', '2020-06-07 22:35:47', 'f55', 'Mandatory', 4, '3', 1, 2, 13);
INSERT INTO "public"."features"("id", "created_at", "updated_at", "name", "type", "height", "description", "abstract", "feature_model_id", "parent") VALUES (13, '2020-06-07 21:14:45', '2020-06-07 22:29:22', 'f2', 'XOR Alternative', 3, '3', 0, 2, 4);
INSERT INTO "public"."features"("id", "created_at", "updated_at", "name", "type", "height", "description", "abstract", "feature_model_id", "parent") VALUES (14, '2020-06-07 21:14:57', '2020-06-07 22:29:28', 'f3', 'Mandatory', 2, '5', 0, 2, 10);
INSERT INTO "public"."features"("id", "created_at", "updated_at", "name", "type", "height", "description", "abstract", "feature_model_id", "parent") VALUES (15, '2020-06-10 21:00:17', '2020-06-10 21:00:17', 'Text Editing System', 'Mandatory', 0, 'SPL core.', 1, 3, NULL);
INSERT INTO "public"."features"("id", "created_at", "updated_at", "name", "type", "height", "description", "abstract", "feature_model_id", "parent") VALUES (16, '2020-06-10 21:00:47', '2020-06-10 21:00:47', 'File Management', 'Mandatory', 1, 'Management  of files', 1, 3, 15);
INSERT INTO "public"."features"("id", "created_at", "updated_at", "name", "type", "height", "description", "abstract", "feature_model_id", "parent") VALUES (17, '2020-06-10 21:01:07', '2020-06-10 21:01:07', 'Help', 'Mandatory', 1, 'Help component', 0, 3, 15);
INSERT INTO "public"."features"("id", "created_at", "updated_at", "name", "type", "height", "description", "abstract", "feature_model_id", "parent") VALUES (18, '2020-06-10 21:01:27', '2020-06-10 21:01:27', 'Change Display Settings', 'Mandatory', 1, 'Settings of the display', 1, 3, 15);
INSERT INTO "public"."features"("id", "created_at", "updated_at", "name", "type", "height", "description", "abstract", "feature_model_id", "parent") VALUES (19, '2020-06-10 21:01:45', '2020-06-10 21:01:45', 'Basic', 'Mandatory', 2, 'Basic file manager', 0, 3, 16);
INSERT INTO "public"."features"("id", "created_at", "updated_at", "name", "type", "height", "description", "abstract", "feature_model_id", "parent") VALUES (20, '2020-06-10 21:02:02', '2020-06-10 21:02:02', 'Edit', 'Mandatory', 2, 'Edit options', 1, 3, 16);
INSERT INTO "public"."features"("id", "created_at", "updated_at", "name", "type", "height", "description", "abstract", "feature_model_id", "parent") VALUES (21, '2020-06-10 21:02:24', '2020-06-10 21:02:24', 'Resize', 'Optional', 2, 'resize options', 0, 3, 18);
INSERT INTO "public"."features"("id", "created_at", "updated_at", "name", "type", "height", "description", "abstract", "feature_model_id", "parent") VALUES (23, '2020-06-10 21:03:03', '2020-06-10 21:03:03', 'Font Color', 'Mandatory', 2, 'change the font color', 1, 3, 18);
INSERT INTO "public"."features"("id", "created_at", "updated_at", "name", "type", "height", "description", "abstract", "feature_model_id", "parent") VALUES (24, '2020-06-10 21:03:22', '2020-06-10 21:03:22', 'Black', 'XOR Alternative', 3, 'black color', 0, 3, 23);
INSERT INTO "public"."features"("id", "created_at", "updated_at", "name", "type", "height", "description", "abstract", "feature_model_id", "parent") VALUES (25, '2020-06-10 21:03:35', '2020-06-10 21:03:35', 'Red', 'XOR Alternative', 3, 'red color', 0, 3, 23);
INSERT INTO "public"."features"("id", "created_at", "updated_at", "name", "type", "height", "description", "abstract", "feature_model_id", "parent") VALUES (26, '2020-06-10 21:03:51', '2020-06-10 21:03:51', 'Case conversion', 'Mandatory', 2, 'convert cases', 1, 3, 18);
INSERT INTO "public"."features"("id", "created_at", "updated_at", "name", "type", "height", "description", "abstract", "feature_model_id", "parent") VALUES (27, '2020-06-10 21:04:08', '2020-06-10 21:04:08', 'Upper Case', 'OR Alternative', 3, 'to upper case', 0, 3, 26);
INSERT INTO "public"."features"("id", "created_at", "updated_at", "name", "type", "height", "description", "abstract", "feature_model_id", "parent") VALUES (28, '2020-06-10 21:04:20', '2020-06-10 21:04:20', 'Lower case', 'OR Alternative', 3, 'to lower case', 0, 3, 26);
INSERT INTO "public"."features"("id", "created_at", "updated_at", "name", "type", "height", "description", "abstract", "feature_model_id", "parent") VALUES (29, '2020-06-10 21:04:48', '2020-06-10 21:04:48', 'Search', 'Optional', 2, 'search function', 0, 3, 16);
INSERT INTO "public"."features"("id", "created_at", "updated_at", "name", "type", "height", "description", "abstract", "feature_model_id", "parent") VALUES (30, '2020-06-10 21:05:03', '2020-06-10 21:05:03', 'Replacement', 'Optional', 2, 'Replacement function', 0, 3, 16);
INSERT INTO "public"."features"("id", "created_at", "updated_at", "name", "type", "height", "description", "abstract", "feature_model_id", "parent") VALUES (31, '2020-06-10 21:05:23', '2020-06-10 21:05:23', 'Copy', 'Mandatory', 3, 'copy fnt', 0, 3, 20);
INSERT INTO "public"."features"("id", "created_at", "updated_at", "name", "type", "height", "description", "abstract", "feature_model_id", "parent") VALUES (32, '2020-06-10 21:05:36', '2020-06-10 21:05:48', 'Select All', 'Optional', 3, 'select all fnt', 0, 3, 20);

/*
Table structure for table 'public.migrations'
*/

DROP TABLE IF EXISTS "public"."migrations" CASCADE;
CREATE UNLOGGED TABLE "public"."migrations" ("id" BIGSERIAL NOT NULL, "migration" VARCHAR(255)  NOT NULL, "batch" INTEGER NOT NULL) ;
ALTER SEQUENCE "public"."migrations_id_seq" RESTART WITH 79 INCREMENT BY 1;
DROP INDEX IF EXISTS "PRIMARY00008";
ALTER TABLE "public"."migrations" ADD CONSTRAINT "PRIMARY00008" PRIMARY KEY ("id");

/*
Dumping data for table 'public.migrations'
*/

INSERT INTO "public"."migrations"("id", "migration", "batch") VALUES (10, '2014_10_12_000000_create_users_table', 1);
INSERT INTO "public"."migrations"("id", "migration", "batch") VALUES (11, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO "public"."migrations"("id", "migration", "batch") VALUES (12, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO "public"."migrations"("id", "migration", "batch") VALUES (13, '2019_12_10_165004_create_projects_table', 2);
INSERT INTO "public"."migrations"("id", "migration", "batch") VALUES (15, '2019_12_20_203338_create_team_table', 3);
INSERT INTO "public"."migrations"("id", "migration", "batch") VALUES (16, '2019_12_20_203338_create_teams_table', 4);
INSERT INTO "public"."migrations"("id", "migration", "batch") VALUES (18, '2020_01_08_194244_create_teams_table', 5);
INSERT INTO "public"."migrations"("id", "migration", "batch") VALUES (19, '2020_01_17_201052_create_artifacts_table', 6);
INSERT INTO "public"."migrations"("id", "migration", "batch") VALUES (43, '2020_02_29_010627_create_techniques_table', 7);
INSERT INTO "public"."migrations"("id", "migration", "batch") VALUES (49, '2020_02_29_013708_create_related_techniques_table', 8);
INSERT INTO "public"."migrations"("id", "migration", "batch") VALUES (70, '2020_02_29_020235_create_technique_project_table', 9);
INSERT INTO "public"."migrations"("id", "migration", "batch") VALUES (71, '2020_03_07_184849_create_assemble_processes_table', 9);
INSERT INTO "public"."migrations"("id", "migration", "batch") VALUES (72, '2020_03_07_191145_create_activities_table', 9);
INSERT INTO "public"."migrations"("id", "migration", "batch") VALUES (73, '2020_03_07_191511_create_activities_inputs_table', 9);
INSERT INTO "public"."migrations"("id", "migration", "batch") VALUES (74, '2020_05_30_135030_create_feature_models_table', 10);
INSERT INTO "public"."migrations"("id", "migration", "batch") VALUES (75, '2020_05_30_135031_create_features_table', 10);
INSERT INTO "public"."migrations"("id", "migration", "batch") VALUES (76, '2020_05_30_135033_create_features_artifacts_table', 10);
INSERT INTO "public"."migrations"("id", "migration", "batch") VALUES (77, '2020_05_30_135033_create_feature_artifacts_table', 11);
INSERT INTO "public"."migrations"("id", "migration", "batch") VALUES (78, '2020_06_06_164248_create_experiences_table', 11);

/*
Table structure for table 'public.password_resets'
*/

DROP TABLE IF EXISTS "public"."password_resets" CASCADE;
CREATE UNLOGGED TABLE "public"."password_resets" ("email" VARCHAR(255)  NOT NULL, "token" VARCHAR(255)  NOT NULL, "created_at" TIMESTAMP) ;
DROP INDEX IF EXISTS "password_resets_email_index";
CREATE INDEX "password_resets_email_index00000" ON "public"."password_resets" ("email");

/*
Dumping data for table 'public.password_resets'
*/


/*
Table structure for table 'public.projects'
*/

DROP TABLE IF EXISTS "public"."projects" CASCADE;
CREATE UNLOGGED TABLE "public"."projects" ("id" BIGSERIAL NOT NULL, "title" VARCHAR(255)  NOT NULL, "description" TEXT NOT NULL, "created_at" TIMESTAMP, "updated_at" TIMESTAMP, "owner_id" BIGINT NOT NULL) ;
ALTER SEQUENCE "public"."projects_id_seq" RESTART WITH 8 INCREMENT BY 1;
DROP INDEX IF EXISTS "PRIMARY00009";
ALTER TABLE "public"."projects" ADD CONSTRAINT "PRIMARY00009" PRIMARY KEY ("id");
DROP INDEX IF EXISTS "projects_owner_id_foreign";
CREATE INDEX "projects_owner_id_foreign00000" ON "public"."projects" ("owner_id");

/*
Dumping data for table 'public.projects'
*/

INSERT INTO "public"."projects"("id", "title", "description", "created_at", "updated_at", "owner_id") VALUES (1, 'Text Editor SPL', 'A sample project for a text editor SPL.', '2020-01-08 19:44:01', '2020-04-02 21:39:30', 1);
INSERT INTO "public"."projects"("id", "title", "description", "created_at", "updated_at", "owner_id") VALUES (2, 'Fa', 'fa', '2020-01-15 21:18:42', '2020-01-15 21:18:42', 3);
INSERT INTO "public"."projects"("id", "title", "description", "created_at", "updated_at", "owner_id") VALUES (3, 't', 't', '2020-02-28 23:25:16', '2020-02-28 23:25:16', 1);
INSERT INTO "public"."projects"("id", "title", "description", "created_at", "updated_at", "owner_id") VALUES (4, 'g', 'g', '2020-02-29 00:05:14', '2020-02-29 00:05:14', 4);
INSERT INTO "public"."projects"("id", "title", "description", "created_at", "updated_at", "owner_id") VALUES (5, '5', '5', '2020-02-29 00:05:36', '2020-02-29 00:05:36', 4);
INSERT INTO "public"."projects"("id", "title", "description", "created_at", "updated_at", "owner_id") VALUES (6, 'Eyal-Salman203', 'Pilot evaluation of PAxSPL', '2020-05-24 07:48:29', '2020-05-24 07:48:29', 1);
INSERT INTO "public"."projects"("id", "title", "description", "created_at", "updated_at", "owner_id") VALUES (7, 'test', 'ts', '2020-06-10 21:29:54', '2020-06-10 21:30:27', 1);

/*
Table structure for table 'public.related_techniques'
*/

DROP TABLE IF EXISTS "public"."related_techniques" CASCADE;
CREATE UNLOGGED TABLE "public"."related_techniques" ("id" BIGSERIAL NOT NULL, "created_at" TIMESTAMP, "updated_at" TIMESTAMP, "related_from" BIGINT NOT NULL, "related_to" BIGINT NOT NULL) ;
ALTER SEQUENCE "public"."related_techniques_id_seq" RESTART WITH 10 INCREMENT BY 1;
DROP INDEX IF EXISTS "PRIMARY00010";
ALTER TABLE "public"."related_techniques" ADD CONSTRAINT "PRIMARY00010" PRIMARY KEY ("id");
DROP INDEX IF EXISTS "related_techniques_related_from_foreign";
CREATE INDEX "related_techniques_related_from_foreign00000" ON "public"."related_techniques" ("related_from");
DROP INDEX IF EXISTS "related_techniques_related_to_foreign";
CREATE INDEX "related_techniques_related_to_foreign00000" ON "public"."related_techniques" ("related_to");

/*
Dumping data for table 'public.related_techniques'
*/

INSERT INTO "public"."related_techniques"("id", "created_at", "updated_at", "related_from", "related_to") VALUES (1, NULL, NULL, 1, 4);
INSERT INTO "public"."related_techniques"("id", "created_at", "updated_at", "related_from", "related_to") VALUES (2, NULL, NULL, 2, 4);
INSERT INTO "public"."related_techniques"("id", "created_at", "updated_at", "related_from", "related_to") VALUES (3, NULL, NULL, 3, 1);
INSERT INTO "public"."related_techniques"("id", "created_at", "updated_at", "related_from", "related_to") VALUES (4, NULL, NULL, 4, 1);
INSERT INTO "public"."related_techniques"("id", "created_at", "updated_at", "related_from", "related_to") VALUES (5, NULL, NULL, 4, 5);
INSERT INTO "public"."related_techniques"("id", "created_at", "updated_at", "related_from", "related_to") VALUES (6, NULL, NULL, 5, 1);
INSERT INTO "public"."related_techniques"("id", "created_at", "updated_at", "related_from", "related_to") VALUES (7, NULL, NULL, 5, 4);
INSERT INTO "public"."related_techniques"("id", "created_at", "updated_at", "related_from", "related_to") VALUES (8, NULL, NULL, 6, 1);
INSERT INTO "public"."related_techniques"("id", "created_at", "updated_at", "related_from", "related_to") VALUES (9, NULL, NULL, 6, 4);

/*
Table structure for table 'public.teams'
*/

DROP TABLE IF EXISTS "public"."teams" CASCADE;
CREATE UNLOGGED TABLE "public"."teams" ("id" BIGSERIAL NOT NULL, "role" VARCHAR(255)  NOT NULL, "company_role" VARCHAR(255) , "spl_exp" TEXT, "retrieval_exp" TEXT, "obs" TEXT, "fca" SMALLINT DEFAULT 0 NOT NULL, "lsi" SMALLINT DEFAULT 0 NOT NULL, "vsm" SMALLINT DEFAULT 0 NOT NULL, "cluster" SMALLINT DEFAULT 0 NOT NULL, "data_flow" SMALLINT DEFAULT 0 NOT NULL, "dependency" SMALLINT DEFAULT 0 NOT NULL, "created_at" TIMESTAMP, "updated_at" TIMESTAMP, "user_id" BIGINT NOT NULL, "project_id" BIGINT NOT NULL, "status" VARCHAR(255)  DEFAULT 'Incomplete' NOT NULL, "retrieval_role" VARCHAR(255)  DEFAULT 'Feature Retriever' NOT NULL) ;
ALTER SEQUENCE "public"."teams_id_seq" RESTART WITH 25 INCREMENT BY 1;
DROP INDEX IF EXISTS "PRIMARY00011";
ALTER TABLE "public"."teams" ADD CONSTRAINT "PRIMARY00011" PRIMARY KEY ("id");
DROP INDEX IF EXISTS "teams_user_id_foreign";
CREATE INDEX "teams_user_id_foreign00000" ON "public"."teams" ("user_id");
DROP INDEX IF EXISTS "teams_project_id_foreign";
CREATE INDEX "teams_project_id_foreign00000" ON "public"."teams" ("project_id");

/*
Dumping data for table 'public.teams'
*/

INSERT INTO "public"."teams"("id", "role", "company_role", "spl_exp", "retrieval_exp", "obs", "fca", "lsi", "vsm", "cluster", "data_flow", "dependency", "created_at", "updated_at", "user_id", "project_id", "status", "retrieval_role") VALUES (1, 'Admin', 'Developer', 'Has a few works published in the field.', 'Applied FCA a few years ago.', 'None to be made.', 1, 1, 1, 0, 1, 1, '2020-01-08 19:44:01', '2020-06-06 18:46:07', 1, 1, 'Complete', 'Feature Retriever');
INSERT INTO "public"."teams"("id", "role", "company_role", "spl_exp", "retrieval_exp", "obs", "fca", "lsi", "vsm", "cluster", "data_flow", "dependency", "created_at", "updated_at", "user_id", "project_id", "status", "retrieval_role") VALUES (3, 'Admin', 'Fa', 'FA', 'FA', 'AF', 0, 0, 1, 0, 0, 0, '2020-01-15 21:18:42', '2020-01-15 21:44:06', 3, 2, 'Complete', 'Architect');
INSERT INTO "public"."teams"("id", "role", "company_role", "spl_exp", "retrieval_exp", "obs", "fca", "lsi", "vsm", "cluster", "data_flow", "dependency", "created_at", "updated_at", "user_id", "project_id", "status", "retrieval_role") VALUES (4, 'Admin', 'fa', 'fa', 'fa', 'fa', 0, 1, 0, 0, 1, 0, '2020-01-15 21:18:56', '2020-01-15 21:44:24', 1, 2, 'Complete', 'Domain Engineer');
INSERT INTO "public"."teams"("id", "role", "company_role", "spl_exp", "retrieval_exp", "obs", "fca", "lsi", "vsm", "cluster", "data_flow", "dependency", "created_at", "updated_at", "user_id", "project_id", "status", "retrieval_role") VALUES (6, 'Admin', '', '', '', '', 0, 0, 0, 0, 0, 0, '2020-02-28 23:25:16', '2020-02-28 23:25:16', 1, 3, 'Incomplete', 'Feature Retriever');
INSERT INTO "public"."teams"("id", "role", "company_role", "spl_exp", "retrieval_exp", "obs", "fca", "lsi", "vsm", "cluster", "data_flow", "dependency", "created_at", "updated_at", "user_id", "project_id", "status", "retrieval_role") VALUES (7, 'Admin', '', '', '', '', 0, 0, 0, 0, 0, 0, '2020-02-29 00:05:14', '2020-02-29 00:05:14', 4, 4, 'Incomplete', 'Feature Retriever');
INSERT INTO "public"."teams"("id", "role", "company_role", "spl_exp", "retrieval_exp", "obs", "fca", "lsi", "vsm", "cluster", "data_flow", "dependency", "created_at", "updated_at", "user_id", "project_id", "status", "retrieval_role") VALUES (8, 'Admin', '', '', '', '', 0, 0, 0, 0, 0, 0, '2020-02-29 00:05:27', '2020-02-29 00:05:27', 1, 4, 'Incomplete', 'Feature Retriever');
INSERT INTO "public"."teams"("id", "role", "company_role", "spl_exp", "retrieval_exp", "obs", "fca", "lsi", "vsm", "cluster", "data_flow", "dependency", "created_at", "updated_at", "user_id", "project_id", "status", "retrieval_role") VALUES (9, 'Admin', '', '', '', '', 0, 0, 0, 0, 0, 0, '2020-02-29 00:05:36', '2020-02-29 00:05:36', 4, 5, 'Incomplete', 'Feature Retriever');
INSERT INTO "public"."teams"("id", "role", "company_role", "spl_exp", "retrieval_exp", "obs", "fca", "lsi", "vsm", "cluster", "data_flow", "dependency", "created_at", "updated_at", "user_id", "project_id", "status", "retrieval_role") VALUES (21, 'Admin', 'Software Engineer', 'Yes', 'None', '', 1, 0, 0, 0, 0, 0, '2020-05-24 07:48:29', '2020-05-24 07:49:00', 1, 6, 'Complete', 'Feature Retriever');
INSERT INTO "public"."teams"("id", "role", "company_role", "spl_exp", "retrieval_exp", "obs", "fca", "lsi", "vsm", "cluster", "data_flow", "dependency", "created_at", "updated_at", "user_id", "project_id", "status", "retrieval_role") VALUES (23, 'Admin', 'CEO', 'Only as CEO', 'CEO Experience', '', 0, 0, 0, 0, 1, 1, '2020-06-10 21:13:47', '2020-06-10 21:14:14', 5, 6, 'Complete', 'Feature Tester');
INSERT INTO "public"."teams"("id", "role", "company_role", "spl_exp", "retrieval_exp", "obs", "fca", "lsi", "vsm", "cluster", "data_flow", "dependency", "created_at", "updated_at", "user_id", "project_id", "status", "retrieval_role") VALUES (24, 'Admin', '', '', '', '', 0, 0, 0, 0, 0, 0, '2020-06-10 21:29:54', '2020-06-10 21:29:54', 1, 7, 'Incomplete', 'Feature Retriever');

/*
Table structure for table 'public.technique_projects'
*/

DROP TABLE IF EXISTS "public"."technique_projects" CASCADE;
CREATE UNLOGGED TABLE "public"."technique_projects" ("id" BIGSERIAL NOT NULL, "created_at" TIMESTAMP, "updated_at" TIMESTAMP, "reason" TEXT, "project_id" BIGINT NOT NULL, "technique_id" BIGINT NOT NULL) ;
ALTER SEQUENCE "public"."technique_projects_id_seq" RESTART WITH 11 INCREMENT BY 1;
DROP INDEX IF EXISTS "PRIMARY00012";
ALTER TABLE "public"."technique_projects" ADD CONSTRAINT "PRIMARY00012" PRIMARY KEY ("id");
DROP INDEX IF EXISTS "technique_projects_project_id_foreign";
CREATE INDEX "technique_projects_project_id_foreign00000" ON "public"."technique_projects" ("project_id");
DROP INDEX IF EXISTS "technique_projects_technique_id_foreign";
CREATE INDEX "technique_projects_technique_id_foreign00000" ON "public"."technique_projects" ("technique_id");

/*
Dumping data for table 'public.technique_projects'
*/

INSERT INTO "public"."technique_projects"("id", "created_at", "updated_at", "reason", "project_id", "technique_id") VALUES (2, '2020-04-15 19:41:03', '2020-04-15 19:41:03', 'FA', 1, 5);
INSERT INTO "public"."technique_projects"("id", "created_at", "updated_at", "reason", "project_id", "technique_id") VALUES (4, '2020-04-17 20:43:44', '2020-04-17 20:43:44', 'Fa', 1, 4);
INSERT INTO "public"."technique_projects"("id", "created_at", "updated_at", "reason", "project_id", "technique_id") VALUES (5, '2020-05-24 07:53:32', '2020-05-24 07:53:32', 'Chosen as it was used in the original study', 6, 5);
INSERT INTO "public"."technique_projects"("id", "created_at", "updated_at", "reason", "project_id", "technique_id") VALUES (7, '2020-05-24 07:57:13', '2020-05-24 07:57:13', 'It was used in the original study', 6, 4);
INSERT INTO "public"."technique_projects"("id", "created_at", "updated_at", "reason", "project_id", "technique_id") VALUES (9, '2020-05-24 07:59:08', '2020-05-24 07:59:08', 'Used to derive code-topics', 6, 1);
INSERT INTO "public"."technique_projects"("id", "created_at", "updated_at", "reason", "project_id", "technique_id") VALUES (10, '2020-05-24 08:12:21', '2020-05-24 08:12:21', 'Set of rules for traceability', 6, 9);

/*
Table structure for table 'public.techniques'
*/

DROP TABLE IF EXISTS "public"."techniques" CASCADE;
CREATE UNLOGGED TABLE "public"."techniques" ("id" BIGSERIAL NOT NULL, "name" VARCHAR(255)  NOT NULL, "type" VARCHAR(255)  NOT NULL, "inputs" VARCHAR(255)  NOT NULL, "definition" VARCHAR(255)  NOT NULL, "priority_order" VARCHAR(255)  NOT NULL, "variations" TEXT NOT NULL, "recommended_situation" TEXT NOT NULL, "not_recommended_situation" TEXT NOT NULL, "created_at" TIMESTAMP, "updated_at" TIMESTAMP) ;
ALTER SEQUENCE "public"."techniques_id_seq" RESTART WITH 21 INCREMENT BY 1;
DROP INDEX IF EXISTS "PRIMARY00013";
ALTER TABLE "public"."techniques" ADD CONSTRAINT "PRIMARY00013" PRIMARY KEY ("id");

/*
Dumping data for table 'public.techniques'
*/

INSERT INTO "public"."techniques"("id", "name", "type", "inputs", "definition", "priority_order", "variations", "recommended_situation", "not_recommended_situation", "created_at", "updated_at") VALUES (1, 'Clustering', 'Static Analysis', 'Development', 'Group features based on their dependencies.', 'Group > Extraction > Categorize', 'Agglomerative Hierarchical Clustering, Divisive Hierarchical Clustering.', 'Clustering is highly recommended in products that possesses high level of dependencies between feature implementations. Besides that, a good documentation is not required when applying this technique.', 'As an static analysis technique, clustering may be unable to find all elements related to the same feature when applied in source code where the implementation of a feature is spread across several modules.', NULL, NULL);
INSERT INTO "public"."techniques"("id", "name", "type", "inputs", "definition", "priority_order", "variations", "recommended_situation", "not_recommended_situation", "created_at", "updated_at") VALUES (2, 'Dependency Analysis', 'Static Analysis', 'Development', 'Leverages static dependencies between program elements. Can be used to validate and describe the interdependence between elements.', 'Extraction > Categorize > Group', 'Data Dependency, Control Dependency, Structural Dependency', 'To perform Dependency Analysis is almost mandatory that the products have high level of dependencies between feature implementations. Besides that, a good documentation is not required when applying this technique.', 'As an static analysis technique, dependency analysis may be unable to find all elements related to the same feature when applied in source code where the implementation of a feature is spread across several modules.', NULL, NULL);
INSERT INTO "public"."techniques"("id", "name", "type", "inputs", "definition", "priority_order", "variations", "recommended_situation", "not_recommended_situation", "created_at", "updated_at") VALUES (3, 'Data Flow Analysis', 'Static Analysis', 'Development', 'Gather information about possible values calculated at different points of an software system. This information is used to determine in which parts of that program a particular value might propagate.', 'Extraction > Categorize > Group', 'Forward Analysis, Backward Analysis', 'To apply this technique in a satisfactory way, source code must be well written. Better results can be reached when source code possesses high level of dependencies between feature implementations. Besides that, a good documentation is not required when applying this technique.', 'Not recommended if the products source code does not have low coupling and high cohesion. Also, if the source code possesses a high variable flow data flow analysis may have uncertain results.', NULL, NULL);
INSERT INTO "public"."techniques"("id", "name", "type", "inputs", "definition", "priority_order", "variations", "recommended_situation", "not_recommended_situation", "created_at", "updated_at") VALUES (4, 'Formal Concept Analysis', 'Information Retrieval Techniques', 'Development; Requirements; Design; Domain', 'A mathematical method that provides a way to identify meaningful groupings of objects that have common attributes.', 'Extraction > Categorize > Group', 'Clarified, Reduced', 'Formal Concept Analysis is recommended when program elements (such as classes, methods, etc.) have meaningful names. Besides that, is highly recommended to use this technique in products well documented.', 'A Information Retrieval Technique cannot achieve quality results when applied to products with no documentation and no meaningful identifiers names. For that reason we don''t recommend the use of Formal Concept Analysis or any other Information Retrieval Technique in those situations.', NULL, NULL);
INSERT INTO "public"."techniques"("id", "name", "type", "inputs", "definition", "priority_order", "variations", "recommended_situation", "not_recommended_situation", "created_at", "updated_at") VALUES (5, 'Latent Semantic Indexing', 'Information Retrieval Techniques', 'Development; Requirements', 'A mathematical method that provides a way to identify meaningful groupings of objects that have common attributes.', 'Extraction > Categorize > Group', 'Latent semantic analysis, Semantic hashing', 'Latent Semantic Indexing is recommended when program elements (such as classes, methods, etc.) have meaningful names. Besides that, is highly recommended to use this technique in products well documented.', 'A Information Retrieval Technique cannot achieve quality results when applied to products with no documentation and no meaningful identifiers names. For that reason we don''t recommend the use of Latent Semantic Indexing or any other Information Retrieval Technique in those situations.', NULL, NULL);
INSERT INTO "public"."techniques"("id", "name", "type", "inputs", "definition", "priority_order", "variations", "recommended_situation", "not_recommended_situation", "created_at", "updated_at") VALUES (6, 'Vector Space Model', 'Information Retrieval Techniques', 'Development; Requirements; Design; Domain', 'An algebraic model for representing text documents in a way where the objects retrieved are modeled as elements of a vector space.', 'Extraction > Categorize > Group', '', 'Vector Space Model is recommended when program elements (such as classes, methods, etc.) have meaningful names. Besides that, is highly recommended to use this technique in products well documented.', 'A Information Retrieval Technique cannot achieve quality results when applied to products with no documentation and no meaningful identifiers names. For that reason we don''t recommend the use of Vector Space Model (VSM) or any other Information Retrieval Technique in those situations.', NULL, NULL);
INSERT INTO "public"."techniques"("id", "name", "type", "inputs", "definition", "priority_order", "variations", "recommended_situation", "not_recommended_situation", "created_at", "updated_at") VALUES (7, 'Expert Driven', 'Support', 'Development; Requirements; Design; Domain', 'This strategy is based on knowledge and experiences of specialists, such as domain engineers, software engineers, stakeholders, etc. This may include the addition of techniques that are not in this process documentation.', 'Categorize > Group > Extraction', '', 'To apply the expert driven strategy is highly recommended to have a team with skills and knowledge involving the re-engineering process of SPL. We also recommend to use Expert Driven as a support strategy along Static Analysis and Information Retrieval.', '', NULL, NULL);
INSERT INTO "public"."techniques"("id", "name", "type", "inputs", "definition", "priority_order", "variations", "recommended_situation", "not_recommended_situation", "created_at", "updated_at") VALUES (8, 'Heuristics', 'Support', 'Development; Requirements; Design; Domain', 'A proposed approach that uses a practical method not guaranteed to be perfect, but sufficient to obtain immediate goals.', 'Categorize > Group > Extraction', '', 'Heuristics can be called supporting techniques, so they can be used in different situations but always along other techniques such as clustering and information retrieval techniques.', '', NULL, NULL);
INSERT INTO "public"."techniques"("id", "name", "type", "inputs", "definition", "priority_order", "variations", "recommended_situation", "not_recommended_situation", "created_at", "updated_at") VALUES (9, 'Rule Based', 'Support', 'Development; Requirements; Design; Domain', 'A set of rules is created to guide and help whoever is performing the feature extraction.', 'Categorize > Group > Extraction', '', 'Rule based techniques are usually created in a specific scenario. For that reason they can only be performed in similar scenarios.', '', NULL, NULL);
INSERT INTO "public"."techniques"("id", "name", "type", "inputs", "definition", "priority_order", "variations", "recommended_situation", "not_recommended_situation", "created_at", "updated_at") VALUES (10, 'Market Analysis', 'Domain', 'Domain', 'Analyze the market to obtain information about related products and to scale the size of the domain.', '', '', '', '', NULL, NULL);
INSERT INTO "public"."techniques"("id", "name", "type", "inputs", "definition", "priority_order", "variations", "recommended_situation", "not_recommended_situation", "created_at", "updated_at") VALUES (11, 'Cost-Benefit Analysis', 'Domain', 'Domain', 'This type of analysis is crucial when developing/migrating a SPL. As complex as it may be, is important to use a set of Cost Models, as well as understand the Customer Needs.', '', 'Cost Models, Customer Needs, Mathematical Models, Algorithms.', '', '', NULL, NULL);
INSERT INTO "public"."techniques"("id", "name", "type", "inputs", "definition", "priority_order", "variations", "recommended_situation", "not_recommended_situation", "created_at", "updated_at") VALUES (12, 'Product RoadMap', 'Domain', 'Development; Requirements; Design; Domain', 'May be defined by several tasks: defining the common and variable features of the SPL, as well as prioritizing them based on customer or market needs. Plan the schedule of development.', '', '', '', '', NULL, NULL);
INSERT INTO "public"."techniques"("id", "name", "type", "inputs", "definition", "priority_order", "variations", "recommended_situation", "not_recommended_situation", "created_at", "updated_at") VALUES (13, 'Prioritize Products', 'Asset', 'Requirements; Design; Domain', 'This kind of task is performed alongside the product roadmap, where the products of this roadmap receive their priority in the development schedule. Based on that, assets will also be prioritized.', '', '', '', '', NULL, NULL);
INSERT INTO "public"."techniques"("id", "name", "type", "inputs", "definition", "priority_order", "variations", "recommended_situation", "not_recommended_situation", "created_at", "updated_at") VALUES (14, 'Architecture Definition', 'Asset', 'Requirements; Design;', 'The reference architecture (RA) is important in SPL development. This architecture is defined is composed of the features that are relevant to the product core. Non-functional features may also be present in the RA.', '', '', '', '', NULL, NULL);
INSERT INTO "public"."techniques"("id", "name", "type", "inputs", "definition", "priority_order", "variations", "recommended_situation", "not_recommended_situation", "created_at", "updated_at") VALUES (15, 'Variability Analysis', 'Asset', 'Requirements; Design; Domain', 'Defining the variation points in the SPL. This variability is performed by analyzing these variation points in terms of variability type. Another important aspect is the dependency analysis among these variation points.', '', '', '', '', NULL, NULL);
INSERT INTO "public"."techniques"("id", "name", "type", "inputs", "definition", "priority_order", "variations", "recommended_situation", "not_recommended_situation", "created_at", "updated_at") VALUES (16, 'Candidate Analysis', 'Product', 'Requirements; Design; Domain', 'Analyze the possible products-to-be is important to determine if they are viable and if they will satisfy customer and company needs. These candidates are part of the product roadmap, and may share their architecture with others.', '', '', '', '', NULL, NULL);
INSERT INTO "public"."techniques"("id", "name", "type", "inputs", "definition", "priority_order", "variations", "recommended_situation", "not_recommended_situation", "created_at", "updated_at") VALUES (17, 'Feature Definition', 'Product', 'Requirements; Domain', 'Define the features that will or not be part of each product is mandatory for defining a product portfolio.', '', '', '', '', NULL, NULL);
INSERT INTO "public"."techniques"("id", "name", "type", "inputs", "definition", "priority_order", "variations", "recommended_situation", "not_recommended_situation", "created_at", "updated_at") VALUES (18, 'Metrics Definition', 'SupportS', 'Development; Requirements; Design; Domain', 'Define metrics for scoping. These metrics may measure costs, market, size of products and features among other important characteristics.', '', '', '', '', NULL, NULL);
INSERT INTO "public"."techniques"("id", "name", "type", "inputs", "definition", "priority_order", "variations", "recommended_situation", "not_recommended_situation", "created_at", "updated_at") VALUES (19, 'Scoping Meta-Model', 'SupportS', 'Requirements; Design; Domain', 'A scoping meta-model may be used for defining some scoping concepts such as requirements, tests, and project and risk management.', '', '', '', '', NULL, NULL);
INSERT INTO "public"."techniques"("id", "name", "type", "inputs", "definition", "priority_order", "variations", "recommended_situation", "not_recommended_situation", "created_at", "updated_at") VALUES (20, 'Evolution Planning', 'SupportS', 'Development; Requirements; Design; Domain', 'Plan the evolution of a SPL may be used to provide additional information and depth to any concept within the scoping type. The evolution plan may consider environment evolution, market evolution and variability evolution.', '', '', '', '', NULL, NULL);

/*
Table structure for table 'public.users'
*/

DROP TABLE IF EXISTS "public"."users" CASCADE;
CREATE UNLOGGED TABLE "public"."users" ("id" BIGSERIAL NOT NULL, "name" VARCHAR(255)  NOT NULL, "email" VARCHAR(255)  NOT NULL, "email_verified_at" TIMESTAMP, "password" VARCHAR(255)  NOT NULL, "remember_token" VARCHAR(100) , "created_at" TIMESTAMP, "updated_at" TIMESTAMP) ;
ALTER SEQUENCE "public"."users_id_seq" RESTART WITH 6 INCREMENT BY 1;
DROP INDEX IF EXISTS "PRIMARY00014";
ALTER TABLE "public"."users" ADD CONSTRAINT "PRIMARY00014" PRIMARY KEY ("id");
DROP INDEX IF EXISTS "users_email_unique";
CREATE UNIQUE INDEX "users_email_unique00000" ON "public"."users" ("email");

/*
Dumping data for table 'public.users'
*/

INSERT INTO "public"."users"("id", "name", "email", "email_verified_at", "password", "remember_token", "created_at", "updated_at") VALUES (1, 'Luciano', 'lamp67@hotmail.com', NULL, '$2y$10$EAepJvAJetJbtbhZxrbfW.iZdhAwiXCeFP86inFVKOUA0G8/eoIky', '', '2019-12-19 20:58:53', '2019-12-19 20:58:53');
INSERT INTO "public"."users"("id", "name", "email", "email_verified_at", "password", "remember_token", "created_at", "updated_at") VALUES (2, 'Pedro', 'pedro@gmail.com', NULL, '$2y$10$pQQJgqIqcB5kpX99seqcKOUPB2lWuph8I1.n3ow8nOicg5KM1fPPm', '', '2020-01-06 20:37:01', '2020-01-06 20:37:01');
INSERT INTO "public"."users"("id", "name", "email", "email_verified_at", "password", "remember_token", "created_at", "updated_at") VALUES (3, 'Tetra', 'jao@gmail.com', NULL, '$2y$10$W8nTIab/xqC0RyyfUD5KxO.x.ng2A4DkkHzZJFIXyiRiDOr80fwwK', '', '2020-01-15 21:18:33', '2020-01-15 21:18:33');
INSERT INTO "public"."users"("id", "name", "email", "email_verified_at", "password", "remember_token", "created_at", "updated_at") VALUES (4, 'lu', 'lu@gmail.com', NULL, '$2y$10$hPy7JRsXOFXITJcv9KQBLe4sH2jtl4ABdB2YBrvpBt2FQPNfp9MDi', '', '2020-02-28 23:25:51', '2020-02-28 23:25:51');
INSERT INTO "public"."users"("id", "name", "email", "email_verified_at", "password", "remember_token", "created_at", "updated_at") VALUES (5, 'Luciano 2', 'augustus.marchezan@gmail.com', NULL, '$2y$10$RZOXnwaifCQNej6RLIppRuHTmxoTogdViwXRKF8YNxsOzLYdYBhCy', '', '2020-06-10 21:13:34', '2020-06-10 21:13:34');
