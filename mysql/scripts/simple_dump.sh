#!/bin/bash

# Variables

$backup-dir=
$default-character-set=
$host=localhost
$port=3306 
$user=homestead
$password=secret
$bkup_path='/home/vagrant/mysql/db_bkup/'
$filename='cv_db.sql' 
# --with-timestamp (void)


mysqldump -u${user} -h${host} --port=${port} --single-transaction > $backupPath/${i}.sql.gz 2>&1) --with-timestamp



# --backup-dir 	The directory to store the backup data. 		
# --backup-image 	Specifies the path name of the backup image. 		
# --backup_innodb_checksum_algorithm 	The name of the checksum algorithm used for validating InnoDB tablespaces. 		
# --backup_innodb_data_file_path 	Specifies Innodb system tablespace files' path and size in backup. 		
# --backup_innodb_data_home_dir 	Backup base directory for all InnoDB data files in the system tablespace. 		
# --backup_innodb_log_file_size 	The size in bytes of each InnoDB backup log file. 		
# --backup_innodb_log_files_in_group 	Number of InnoDB log files in backup. 		
# --backup_innodb_log_group_home_dir 	Backup directory for InnoDB log files. 		
# --backup_innodb_page_size 	The page size for all InnoDB tablespaces in a MySQL instance. 		
# --backup_innodb_undo_directory 	The relative or absolute directory path where InnoDB creates separate tablespaces for the undo logs. 		
# --backup_innodb_undo_logs 	Number of rollback segments in the system tablespace that InnoDB uses within a transaction. 		
# --backup_innodb_undo_tablespaces 	The number of tablespace files that the undo logs are divided between when a non-zero innodb_undo_logs setting is used. 		
# --character-sets-dir 	Directory for character set files. 		
# --cloud-access-key-id 	AWS access key ID for logging onto Amazon S3. 		
# --cloud-aws-region 	Region for Amazon Web Services that mysqlbackup access for S3. 		
# --cloud-basicauth-url 	The URL for HTTP Basic Authentication for accessing Swift. 	4.1.1 	
# --cloud-bucket 	The storage bucket on Amazon S3 for the backup image. 		
# --cloud-buffer-size 	Size of buffer for cloud operations. 	4.1.1 	
# --cloud-ca-info 	Absolute path to the CA bundle file for host authentication for SSL connections. 		
# --cloud-ca-path 	CA certificate directory, in addition to the system's default folder. 		
# --cloud-chunked-transfer 	Use chunked transfer with cloud Swift service. 	4.1.1 	
# --cloud-container 	The Swift container for the backup image. 		
# --cloud-identity-url 	The URL of the Keystone identity service. 		
# --cloud-oauth-token 	The OAuth token for accessing Oracle Cloud Infrastructure Object Storage. 	4.1.2 	
# --cloud-object 	The Swift object for the backup image. 		
# --cloud-object-key 	The Amazon S3 object key for the backup image. 		
# --cloud-password 	Password for user specified by --cloud-user-id. 		
# --cloud-proxy 	Proxy address and port number for overriding the environment's default proxy settings for accessing cloud service. 		
# --cloud-region 	The Keystone region for the user specified by --cloud-user-id. 		
# --cloud-secret-access-key 	AWS secret access key. 		
# --cloud-service 	Cloud service for data backup or restoration. 		
# --cloud-storage-url 	The Oracle Cloud Infrastructure Object Storage URL when using OAuth for client authentication. 	4.1.2 	
# --cloud-tempauth-url 	The URL of the identity service for authenticating user credentials with Swift's TempAuth authentication system. 		
# --cloud-tenant 	The Keystone tenant for the user specified by --cloud-user-id. 		
# --cloud-trace 	Print trace information for cloud operations. 		
# --cloud-user-id 	User ID for accessing Swift. 		
# --comments 	Specifies comments string. 		
# --comments-file 	Specifies path to comments file. 		
# --compress 	Create backup in compressed format. 		
# --compress-level 	Specifies the level of compression. 		
# --compress-method 	Specifies the compression algorithm. 		
# --connect-if-online 	Use connection only if available. 		
# --connect_timeout 	Connection timeout in seconds. 		
# --databases 	[Legacy] Specifies the list of non-InnoDB tables to back up. 		
# --databases-list-file 	[Legacy] Specifies the pathname of a file that lists the non-InnoDB tables to be backed up. 		
# --datadir 	Path to mysql server data directory. 		
# --debug 	Print debug information. 		
# --decrypt 	Decrypt backup image written in an MEB Secure File. 		
# --default-character-set 	Set the default character set. 		
# --defaults-extra-file 	Read this file after the global files are read. 		
# --defaults-file 	Only read default options from the given file. 		
# --defaults-group-suffix 	Also read option groups with the usual names and a suffix of str. 		
# --disable-manifest 	Disable generation of manifest files for a backup operation. 		
# --dst-entry 	Used with single-file backups to extract a single file or directory to a user-specified path. 		
# --encrypt 	Encrypt backup image and write it in an MEB Secure File. 		
# --encrypt-password 	The user-supplied password by which mysqlbackup encrypts the encryption keys for encrypted InnoDB tablespaces. 		
# --error-code 	The exit code for which the print-message command prints the corresponding exit message. 		
# --exclude-tables 	Exclude in a backup (or in a restore of a TTS backup) tables whose names match the regular expression REGEXP. 		
# --exec-when-locked 	Execute the specified utility in the lock phase near the end of the backup operation. 		
# --force 	Force overwriting of data, log, or image files, depending on the operation. 		
# --free-os-buffers 	Free filesystem cache by syncing the buffers 		
# --generate-new-master-key 	Generate new master key for encrypted InnoDB tablespaces. 		
# --help 	Display help. 		
# --host 	Host name to connect. 		
# --include 	[Legacy] Backup only those per-table innodb data files which match the regular expression REGEXP. 		
# --include-tables 	Include in a backup (or in a restore of a TTS backup) tables which match the regular expression REGEXP. 		
# --incremental 	Specifies that the associated backup or backup-to-image operation is incremental. 		
# --incremental-backup-dir 	Specifies the location for an incremental directory backup. 		
# --incremental-base 	The specification of base backup for --incremental option. 		
# --incremental-with-redo-log-only 	Specifies the incremental backup of InnoDB tables to be based on copying redo log to the backup, without including any InnoDB data files in the backup. 		
# --innodb_checksum_algorithm 	The name of the checksum algorithm used for validating InnoDB tablespaces. 		
# --innodb_data_file_path 	Specifies InnoDB system tablespace files' path and size. 		
# --innodb_data_home_dir 	Specifies base directory for all InnoDB data files in the shared system tablespace. 		
# --innodb_log_file_size 	The size in bytes of each InnoDB log file in the log group. 		
# --innodb_log_files_in_group 	The number of InnoDB log files. 		
# --innodb_log_group_home_dir 	The directory path to InnoDB log files. 		
# --innodb_page_size 	The page size for all InnoDB tablespaces in a MySQL instance. 		
# --innodb_undo_directory 	The directory path to InnoDB undo tablespaces. 		
# --key 	The symmetric key used for encryption and decryption. 		
# --key-file 	The pathname of a file that contains the symmetric key used for encryption and decryption. 		
# --keyring 	The kind of keyring plugin used for master encryption key management. 		
# --keyring_file_data 	Path to the keyring file. 		
# --keyring_okv_conf_dir 	Path to the Oracle Key Vault (OKV) endpoint directory. 		
# --limit-memory 	The memory in MB available for the MEB operation. 		
# --lock-wait-retry-count 	Specify the maximum number of retries to be attempted by mysqlbackup after the FLUSH TABLES WITH READ LOCK statement fails due to a timeout. 	4.1.4 	
# --lock-wait-timeout 	Specify the timeout in seconds for the FLUSH TABLES WITH READ LOCK statement that mysqlbackup issues during the final stage of a backup. 		
# --log-bin 	Specify the location for the binary log to be restored. 	4.1.2 	
# --log-bin-index 	Specifies the absolute path of the index file that lists all the binary log files. 		
# --login-path 	Read options from the named login path in the .mylogin.cnf login file. 		
# --master-info-file 	Specifies the absolute path of the information file in which a slave records information about its master (for offline backups of slave servers only). information file. 		
# --messages-logdir 	Specifies the path name of an existing directory for storing the message log. 		
# --no-connection 	Do not connect to server. 		
# --no-defaults 	Do not read default options from any given file. 		
# --no-history-logging 	Disable history logging even if connection is available. 		
# --no-locking 	Disable all locking of tables during backups. 		
# --number-of-buffers 	Specifies the exact number of memory buffers to be used for the backup operation. 		
# --on-disk-full 	Specifies the behavior when a backup process encounters a disk-full condition. 		
# --only-innodb 	Back up only InnoDB data and log files. 		
# --only-innodb-with-frm 	[Legacy] Back up only InnoDB data, log files, and the .frm files associated with the InnoDB tables. 		
# --only-known-file-types 	Includes only files of a list of known types in the backup. 		
# --optimistic-busy-tables 	Perform an optimistic backup, using the regular expression specified with the option to select tables that will be skipped in the first phase of an optimistic backup. 		
# --optimistic-time 	Perform an optimistic backup with the value specified with the option as the optimistic time—a time after which tables that have not been modified are believed to be inactive tables. 		
# --page-reread-count 	Maximum number of page re-reads. 		
# --page-reread-time 	Wait time before a page re-read. 		
# --password 	Connection password. 		
# --pipe 	alias for –protocol=pipe. 		
# --port 	TCP portnumber to connect to. 		
# --print-defaults 	Print a list of option values supplied by defaults files and exit. 		
# --process-threads 	Specifies the number of process-threads for the backup operation. 		
# --progress-interval 	Interval between progress reports in seconds. 		
# --protocol 	Connection protocol. 		
# --read-threads 	Specifies the number of read-threads for the backup operation. 		
# --relay-log 	Specify the location for the relay log to be restored on a slave server. 	4.1.2 	
# --relay-log-index 	Specifies the absolute path of the index file that lists all the relay log files. 		
# --relaylog-info-file 	Specifies the absolute path of the information file in which a slave records information about the relay logs (for offline backups of slave servers only). 		
# --rename 	Rename a single table when it is selected by the --include-tables option to be restored 		
# --safe-slave-backup-timeout 	When backing up a slave server, the timeout value for waiting for the slave SQL thread to drop its temporary tables. 		
# --sbt-database-name 	Used as a hint to the Media Management Software (MMS) for the selection of media and policies for tape backup. 		
# --sbt-environment 	Comma separated list of environment variable assignments to be given to the SBT library. 		
# --sbt-lib-path 	Path name of the SBT library used by software that manages tape backups. 		
# --secure-auth 	Refuse client connecting to server if it uses old (pre-4.1.1) protocol. 		
# --shared-memory-base-name 	It designates the shared-memory name used by a Windows server to permit clients to connect using shared memory (Windows only). 		
# --show-progress 	Instructs mysqlbackup to periodically output short progress reports known as progress indicators on its operation. 		
# --skip-binlog 	Do not include binary log files during backup, or do not restore binary log files during restore. 		
# --skip-final-rescan 	Skip the final rescan for InnoDB tables that are modified by DDL operations. 		
# --skip-messages-logdir 	Disable logging to teelog file. 		
# --skip-relaylog 	Do not include relay log files during backup, or do not restore relay log files during a restore. 		
# --skip-unused-pages 	Skip unused pages in tablespaces when backing up InnoDB tables. 		
# --slave-info 	Capture information needed to set up an identical slave server. 		
# --sleep 	Time to sleep in milliseconds after copying each 1MB of data. 		
# --socket 	Socket file to use to connect. 		
# --src-entry 	Identifies a file or directory to extract from a single-file backup. 		
# --ssl 	Enable SSL for connection (automatically enabled with other --ssl- flags). 		4.1.0
# --ssl-ca 	CA file in PEM format (implies –ssl). 		
# --ssl-capath 	CA directory (check OpenSSL docs,implies --ssl). 		
# --ssl-cert 	X509 cert in PEM format (implies --ssl). 		
# --ssl-cipher 	SSL cipher to use (implies --ssl). 		
# --ssl-key 	X509 key in PEM format (implies --ssl). 		
# --ssl-mode 	Security state of connection to server. 	4.1.0 	
# --ssl-verify-server-cert 	Verify server's "Common Name" in its cert against hostname used when connecting. 		4.1.0
# --start-lsn 	Specifies the highest LSN value included in a previous backup. 		
# --suspend-at-end 	Pauses the mysqlbackup command when the backup procedure is close to ending. 		
# --trace 	Trace level of messages by mysqlbackup. 		
# --uncompress 	Uncompress the compressed backup before an apply-log, copy-back, or copy-back-and-apply-log operation. 		
# --use-tts 	Enable selective backup of InnoDB tables using transportable tablespaces (TTS). 		
# --user 	Database user name to connect. 		
# --verbose 	Print more verbose information. 		
# --version 	Display version information. 		
# --with-timestamp 	Create a subdirectory underneath the backup directory with a name formed from the timestamp of the backup operation. 		
# --write-threads 	Specifies the number of write-threads for the backup operation.
