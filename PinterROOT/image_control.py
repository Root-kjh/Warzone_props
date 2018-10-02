import logging 
class image_error(Exception):
    def __str__(self):
        return logging.exception("message")

class image_upload():
    def __init__(self,image,src):
        self.image=image
        self.src="templates/"+src
        self.image.save(self.src)
