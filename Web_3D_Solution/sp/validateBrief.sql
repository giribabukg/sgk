DELIMITER $$

USE `nextdb`$$

DROP PROCEDURE IF EXISTS `validateBrief`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `validateBrief`(
 IN rowid VARCHAR (50),
 IN phaseId VARCHAR(50),
 IN season VARCHAR(50),
 OUT transids VARCHAR(10))
BEGIN

	DECLARE shpaeStartPhase VARCHAR(100);
	DECLARE done INT;
	DECLARE ids INT;
	DECLARE rangeval VARCHAR(255);
	DECLARE seasonval VARCHAR(255);
	DECLARE seasonvals VARCHAR(255);
	DECLARE categoryval VARCHAR(255);
	DECLARE categoryvals VARCHAR(255);
	DECLARE phaseval VARCHAR(255);
	DECLARE volnewness INT;
	DECLARE volexis INT;
	DECLARE totalvol INT;
	
	
	DECLARE cur1 CURSOR FOR
	 SELECT id,shape_start_phase,sofa_range FROM next_main_upload_temp WHERE phaseid = phaseId;
	 #SELECT id,shape_start_phase,sofa_range FROM next_main_upload_temp WHERE phaseid = 'PH00059';
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done =1;
	
	SET done =0;
	OPEN cur1;
	igmLoop: LOOP
	
	
	FETCH cur1 INTO ids,shpaeStartPhase,rangeval;
	IF done =1 THEN LEAVE igmLoop; END IF;
	
	IF shpaeStartPhase = season
	THEN
	
	INSERT INTO next_main_upload_newness SELECT * FROM next_main_upload_temp WHERE id = ids;
	ELSE
	
	
	INSERT INTO next_main_upload_newness 
	(`six_two_six`,`product_area`,`season`,`shape_start_phase`,`sofa_range`,`material_type`,`size_range`,`size_descrption`,`swatch_item_number`,`swatch_item_fabric`,
	`swatch_item_fabric_colour`,`foot_start_phase`,`foot_type`,`foot_colour`,`chair_format`,`bed_detail`,`fabric_start_phase`,`pattern_match`,`piping`,`phaseid`) 
	SELECT 
	`six_two_six`,`product_area`,`season`,`shape_start_phase`,`sofa_range`,`material_type`,`size_range`,`size_descrption`,`swatch_item_number`,`swatch_item_fabric`,
	`swatch_item_fabric_colour`,`foot_start_phase`,`foot_type`,`foot_colour`,`chair_format`,`bed_detail`,`fabric_start_phase`,`pattern_match`,`piping`,`phaseid` FROM next_main_upload_temp WHERE id = 1;
	
	INSERT INTO next_main_upload_exists 
	(`six_two_six`,`product_area`,`season`,`shape_start_phase`,`sofa_range`,`material_type`,`size_range`,`size_descrption`,`swatch_item_number`,`swatch_item_fabric`,
	`swatch_item_fabric_colour`,`foot_start_phase`,`foot_type`,`foot_colour`,`chair_format`,`bed_detail`,`fabric_start_phase`,`pattern_match`,`piping`,`phaseid`) 
	SELECT 
	`six_two_six`,`product_area`,`season`,`shape_start_phase`,`sofa_range`,`material_type`,`size_range`,`size_descrption`,`swatch_item_number`,`swatch_item_fabric`,
	`swatch_item_fabric_colour`,`foot_start_phase`,`foot_type`,`foot_colour`,`chair_format`,`bed_detail`,`fabric_start_phase`,`pattern_match`,`piping`,`phaseid` FROM next_main_upload_temp WHERE id = 1;
	
	
	
	
	
	
	
	END IF;
	
	END LOOP igmLoop;
	CLOSE cur1;
	
	
	SELECT COUNT(*) INTO volnewness FROM next_main_upload_newness WHERE phaseid = phaseId;
	SELECT COUNT(*) INTO volexis FROM next_main_upload_exists WHERE phaseid = phaseId AND batchid IS NULL;
	SELECT DISTINCT seasonId,categoryiD INTO seasonval,categoryval 
	FROM next_main_phase_table WHERE phaseid = phaseId;
	SELECT dataname INTO  seasonvals 
	FROM next_master_data_detail a,
	next_master_header_detail b
	WHERE a.headerid = b.id
	AND a.id = seasonval
	AND b.HeaderName = 'Season';
	SELECT dataname INTO  categoryvals
	 FROM next_master_data_detail a,
	next_master_header_detail b 
	WHERE a.headerid = b.id
	AND a.id = categoryval
	AND b.HeaderName = 'Category';

	
	SET totalvol = volexis + volnewness;
	SET phaseval = CONCAT(seasonvals,' ',categoryvals);
	
	
	INSERT INTO next_range_overview_table (phaseval,rangeval,rendervol,completed,phaseid)
VALUES (phaseval,rangeval,totalvol,'0',phaseId);	
	
	 
	
	
	
    END$$

DELIMITER ;