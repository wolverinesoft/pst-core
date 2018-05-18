<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Pages_M extends Master_M
{
  	function __construct()
	{
		parent::__construct();
	}
	
	public function getPages($active = 0, $location = NULL)
	{
		if($active)
			$where = array('active' => 1);
		if($location)
		{
			$this->db->like('location', $location);
			if($location == 'footer')
				$this->db->limit(FOOTER_PAGE_LIMIT);
		}
		$this->db->order_by("delete", "asc"); 
		
		$records = $this->selectRecords('pages', @$where);
		return $records;
	}
	
	public function getPagesDD()
	{
		$records = FALSE;
		$where = array('active' => 1);
		$records = $this->selectRecords('pages', @$where);
		if($records)
		{
			$dd = array();
		}
		return $records;
	}
	
	public function getPageRec($pageId)
	{
		$where = array('id' => $pageId);
		$record = $this->selectRecord('pages', $where);
		return $record;
	}
	
	public function getPageRecByTag($tag)
	{
		$where = array('tag' => $tag);
		$record = $this->selectRecord('pages', $where);
		return $record;
	}
	
	public function getWidgets()
	{
		$records = FALSE;
		$records = $this->selectRecords('widgets');
		if($records)
		{
			$loop = $records;
			$records = array();
			foreach($loop as $rec)
				$records[$rec['id']] = $rec;
		}
		return $records;
	}
	
	public function editPageActive($post)
	{
		$where = array('delete' => 1);
		$data = array('active' => 0);
		$this->updateRecord('pages', $data, $where, FALSE);
		if(@is_array($post['active']))
		{
			foreach($post['active'] as $id)
			{
				$where = array('id' => $id);
				$data = array('active' => 1);
				$this->updateRecord('pages', $data, $where, FALSE);
			}
		}
	}
	
	private function tag_creating($url) 
	{
	   $url = preg_replace('~[^\\pL0-9_]+~u', '', $url);
	   $url = str_replace(' ', '', $url);
	   $url = trim($url, "-");
	   $url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
	   $url = strtolower($url);
	   $url = preg_replace('~[^-a-z0-9_]+~', '', $url);
	   return $url;
	}

	public function tagIsAvailable($tag, $page_id = 0) {
  	    $query = $this->db->query("Select count(*) as cnt from pages where id != ? and tag = ?", array($page_id, $tag));
  	    $count = 0;
  	    foreach ($query->result_array() as $row) {
  	        $count = $row['cnt'];
        }
        return $count == 0;
    }

    public function updatePageSectionOrdinals($page_id, $page_section_ids) {
        $query = $this->db->query("Select page_section_id from page_section where page_id = ?", array($page_id));
        $prior_sections = $query->result_array();
        $seen_sections = array();

        $ordinal = 0;
        foreach ($page_section_ids as $psid) {
            $ordinal++;
            if (!in_array($psid, array('Textbox','Video','Slider', 'Gallery', 'Events'))) {
                // Insert it!
                $this->db->query("Insert into page_section (page_id, ordinal, type) values (?, ?, ?)", array($page_id, $ordinal, $psid));
                $real_psid = $this->db->insert_id();

                if ($psid == "Textbox") {
                    $this->db->query("Insert into textbox (pageId, `order`, text, page_section_id) values (?, ?, '', ?)", array($page_id, $ordinal, $real_psid));
                }

            } else {
                $seen_sections[] = $psid;
                $this->db->query("Update page_section set ordinal = ? where page_section_id = ? limit 1", array($ordinal, $psid));
            }
        }

        // now, delete the junk ones
        foreach ($prior_sections as $rec) {
            $psid = $rec["page_section_id"];
            if (!in_array($psid, $seen_sections)) {
                $this->db->query("Delete from page_section where page_id = ? and page_section_id = ? limit 1", array($page_id, $psid));
            }
        }
    }

	public function editPage($post)
	{
		if($post['id'] == 12) {
            $post['tag'] = 'Motorcycle_Gear_Brands';
        } else if (array_key_exists("tag", $post) && $post["tag"] != "") {
		    if ($this->tagIsAvailable($post["tag"], $post['id'])) {
                $post['tag'] = $post['tag']; // do nothing...
            } else {
		        unset($post["tag"]); // don't change it.
            }
		} else {
			$post['tag'] = $this->tag_creating($post['label']);
		}

		if(!empty($post['widgets']))
			$post['widgets'] = json_encode($post['widgets'], TRUE);
		else
			$post['widgets'] = '';
		if(is_numeric($post['id']))
		{
			$where = array('id' => $post['id']);
			$success = $this->updateRecord('pages', $post, $where, FALSE);
		}
		else
		{	
			$data['delete'] = 1;
			$data['active'] = 0;		
			$success = $this->createRecord('pages', $post, FALSE);
		}
		return $success;
	}
	
	public function getTextBoxes($pageId, $page_section_id = 0)
	{
	    if ($page_section_id > 0) {
	        $values = array($pageId, $page_section_id);
            $query = "Select textbox.* from textbox join page_section on textbox.pageId = page_section.page_id and textbox.page_section_id = page_section.page_section_id where textbox.pageId = ? and textbox.page_section_id = ? order by page_section.ordinal";
        } else {
	        $values = array($pageId);
            $query = "Select textbox.* from textbox join page_section on textbox.pageId = page_section.page_id and textbox.page_section_id = page_section.page_section_id where textbox.pageId = ? order by page_section.ordinal";
        }

	    $query = $this->db->query($query, $values);
	    return $query->result_array();

	}
	
	public function updateTextBox($post)
	{
		if(@$post['id'])
		{
			$where = array('id' => $post['id']);
			$success = $this->updateRecord('textbox', $post, $where, FALSE);
		}
		else
		{
			$success = $this->createRecord('textbox', $post, FALSE);
		}
	}

	public function getPageSections($pageId) {
        $query = $this->db->query("Select * from page_section where page_id = ? order by ordinal", array($pageId));
        return $query->result_array();
    }
	
	public function widgetCreator($pageId, $pageRec)
	{
        // JLB 07-07-17
        // JLB - I am going to short-circuit this into a simpler thing to implement EXACTLY what Brandt said, as I think he said it,
        // because, ultimately, this widgets array, seems pointless.

        $widgetBlock = '';

        foreach ($this->getPageSections($pageId) as $section) {
            $page_section_id = $section["page_section_id"];

            switch($section["type"]) {
                case "Textbox":
                    // textblocks
                    $textboxes = $this->getTextBoxes($pageId, $page_section_id);
                    if(!is_null($textboxes) && is_array($textboxes) && count($textboxes) > 0)
                    {
                        usort($textboxes, function($a, $b) {
                            return ($a["order"] < $b["order"] ? -1 : ($a["order"] > $b["order"] ? 1 : 0));
                        });

                        foreach($textboxes as $text)
                        {
                            if (trim($text['text']) != "") {
                                $widgetBlock .= '<div class="content_section">';
                                $widgetBlock .= '<h3>' . $text['text'] . '</h3>';
                                $widgetBlock .= '</div>';
                            }
                        }
                    }
                    break;

                case "Video":
                    // videos
                    $topVideo = $this->getTopVideos($pageId, $page_section_id);
                    if (!is_null($topVideo) && is_array($topVideo) && count($topVideo) > 0) {
                        $mainVideo = $mainTitle = '';
                        foreach ($topVideo as $key => $val) {
                            if ($val['ordering'] == 1) {
                                $mainVideo = $val['video_url'];
                                $mainTitle = $val['title'];
                                unset($topVideo[$key]);
                                break;
                            }
                        }
                        // Note that below there is a category video that is, well, undefined.
                        $data1['mainVideo'] = $mainVideo;
                        $data1['mainTitle'] = $mainTitle;
                        $data1['video'] = $topVideo;
                        $data1["mainVideo_word"] = "widget-video-" . $page_section_id;
                        $data1["id_extra"] = "-id-extra-" . $page_section_id;
                        $widgetBlock .= $this->load->view('widgets/videos_v', $data1, TRUE);
                    }
                    break;


                case "Slider":

                    // slider
                    $bannerImages = $this->admin_m->getSliderImages($pageId, $page_section_id);
                    $data = array();
                    if(!is_null($bannerImages) && is_array($bannerImages) && count($bannerImages) > 0)
                    {
                        // There was a significant problem with the ordinals.
                        $correct_ordinal = 0;
                        foreach($bannerImages as $img)
                        {
                            $correct_ordinal++;
                            $data['sliderImages'][$correct_ordinal] = $img;
                        }
                        $data["slider_transition_time"] = intVal(1000 * $section["slider_seconds"]);
                        $widgetBlock .= $this->load->view('widgets/slider_v', $data, TRUE);
                        $widgetBlock .='<br />';
                    }
                    break;
            }




        }

        return $widgetBlock;
	}
	
	public function deletePage($pageId)
	{
		$where = array('id' => $pageId);
		return $this->deleteRecord('pages', $where);
	}
	
	
    public function getSliderImagesForFront($pageId) {
        $where = array('pageId' => $pageId);
        $this->db->order_by('order ASC');
        $records = $this->selectRecords('slider', $where);
        return $records;
    }
	
	public function getServiceEmail() {
		$this->db->select('service_email');
		$where = array('id' => '1');
        $record = $this->selectRecord('contact', $where);
		return $record['service_email'];
	}
	public function getFinanceEmail() {
		$this->db->select('finance_email');
		$where = array('id' => '1');
        $record = $this->selectRecord('contact', $where);
		return $record['finance_email'];
	}

	// FALSE reverts back to our old favorite functionality.
    public function getTopVideos($pageId, $page_section_id = FALSE) {
        $this->db->where('page_id', $pageId);
        if (FALSE !== $page_section_id) {
            $this->db->where('page_section_id', $page_section_id);
        }
        $records = $this->selectRecords('top_videos');
        return $records;
    }

    public function updateTopVideos($id, $page_section_id, $arr) {
        $this->db->delete('top_videos', array('page_id' => $id, "page_section_id" => $page_section_id));
        if (!empty($arr)) {
            $this->db->insert_batch('top_videos', $arr);
        }
    }
}