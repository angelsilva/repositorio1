							<ul>
								<li><a href="javascript:alert('Not Implemented Yet');">Evaluate <img src="{librerias}/resources/img/eval.png"/></a></li>
								<li><a href="{URL}?courses/formEditBasicInfo/<?=(isset($data['items'][0])) ? $data['items'][0]->idCursos : '' ?>">Edit <img src="{librerias}/resources/img/edit_min.png"/></a></li>
								<li><a href="javascript:deleteCourse(<?=(isset($data['items'][0])) ? $data['items'][0]->idCursos : '' ?>)">Delete <img src="{librerias}/resources/img/delete.png"/></a></li>
								<li><a href="javascript:alert('Not Implemented Yet');">Print <img src="{librerias}/resources/img/print.png"/></a></li>
								<li><a href="{URL}?courses/duplicate/<?=(isset($data['items'][0])) ? $data['items'][0]->idCursos : '' ?>">Duplicate <img src="{librerias}/resources/img/clone.png"/></a></li>
								<li><a href="javascript:alert('Not Implemented Yet');">Add Cart <img src="{librerias}/resources/img/add_car.png"/></a></li>
							</ul>